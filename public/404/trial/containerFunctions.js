// containerFunctions.js

function initializeContainerFunctions() {
    const container = document.querySelector('.container');
    const fileInput = document.getElementById('editFileInput');
    const fileNameInput = document.getElementById('fileName');
    const selectFileButton = document.getElementById('selectFileButton');
    const previewImage = document.getElementById('previewImage');
    const closeIcon = document.getElementById('closeIcon');
    const existingImageUrl = container.getAttribute('data-existing-image-url');
    let fileStack = [];

    // Click to trigger file input
    selectFileButton.addEventListener('click', () => {
        fileInput.click();
    });

    // Handle file selection and preview update
    fileInput.addEventListener('change', (event) => {
        const files = Array.from(event.target.files);
        files.forEach((file) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                fileStack.push({ url: e.target.result, name: file.name });
                updatePreview();
            };
            reader.readAsDataURL(file);
        });
        event.target.value = ''; // Reset input for re-uploads
    });

    // Add event to close icon to remove last added image
    closeIcon.addEventListener('click', () => {
        fileStack.pop();
        updatePreview();
    });

    // Function to update the image preview
    function updatePreview() {
        if (fileStack.length > 0) {
            const lastFile = fileStack[fileStack.length - 1];
            previewImage.src = lastFile.url;
            fileNameInput.value = lastFile.name;
            closeIcon.style.display = 'flex'; // Show the close icon
        } else {
            previewImage.src = existingImageUrl;
            fileNameInput.value = 'No file chosen';
            closeIcon.style.display = 'none'; // Hide the close icon
        }
    }

    // Initial preview setup
    updatePreview();
}
