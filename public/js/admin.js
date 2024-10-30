document.addEventListener("DOMContentLoaded", function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const modal = document.getElementById("modal-edit-participant");
    const closeModalButtons = document.querySelectorAll(".close-modal");
    const openModalButton = document.getElementById(
        "open-modal-edit-participant"
    ); // Button ID to open modal

    // Function to open modal and load participant data
    function openModal(participantId) {
        // Load participant data using AJAX (fetch)
        fetch(`/participant/${participantId}/edit`)
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("modal-content").innerHTML = data; // Load the data into modal content
                modal.classList.remove("hidden");
                modal.classList.add(
                    "transition-opacity",
                    "duration-300",
                    "ease-out"
                );
                setTimeout(() => {
                    modal.classList.add("opacity-100");
                }, 300);
            })
            .catch((error) =>
                console.error("Error loading participant data:", error)
            );
    }

    // Function to close modal
    function closeModal() {
        modal.classList.remove("opacity-100");
        setTimeout(() => {
            modal.classList.add("hidden");
        }, 10);
    }

    // Attach event listener to each edit button
    document.querySelectorAll(".edit-button").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            const participantId = this.getAttribute("data-id"); // Get participant ID
            openModal(participantId);
        });
    });

    // Attach event listeners for closing the modal
    closeModalButtons.forEach((button) => {
        button.addEventListener("click", closeModal);
    });

    // Close modal on clicking outside the modal content
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    $('#scan-barcode').on('change', function(){
       let barcode =  $('#scan-barcode').val();
      $.ajax({
        method : "GET",
        url : "/barcode-check/"+ barcode,
        success : function(response){
            if (response.status === 'success') {
                // Menambahkan data peserta ke tabel
                $('#participant-table-one tbody').empty();
                var participant = response.participant;
                var gender = participant.gender === 'P' ? 'Akhwan' : 'Ihkwan';
                alert("data ditemukan silahkan masuk")
                $('#participant-table-one tbody').append(
                    '<tr>' +
                        '<td>' + participant.name + '</td>' +
                        '<td>' + participant.phone + '</td>' +
                        '<td>' + gender + '</td>' +
                        '<td>' + participant.barcode_check_in_1 + '</td>' +
                        '<td><span id="action-check-in" data-id="'+ participant.id+'" class="bg-blue-950" > Check In </span>'+
                    '</tr>'
                );
                $('#scan-barcode').val('')
             
            } else {
                $('#participant-table-one tbody').empty();
                $('#scan-barcode').val('')
                alert(response.message);

            }
            
        }
      })
    })
    $(document).ready(function(){
        // $('#action-check-in').addAttr('class')
        $('#action-check-in').addClass('bg-black');
    })
        $(document).on('click', '#action-check-in', function(){
            let id = $(this).data('id');
            console.log(id)

            $.ajax({
                data : {'id' : id},
                method : 'POST',
                url : '/barcode/check-in',
                success : function(response){
                    console.log(response.code);
                    if(response.code == 202){
                        alert('Anda sudah check in sebelumnya !');
                        $('#participant-table-one tbody').empty();
                    }else if(response.code == 200){
                        alert('Terima Kasih sudah check in');
                        $('#participant-table-one tbody').empty();
                    }
                }
            })
        });
});
