document.addEventListener("DOMContentLoaded", function () {
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
});
