/* // containerFunctions.js

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
 */
// Function to load the container with the existing image
function loadContainer(existingImageUrl) {
    const containerHTML = `
        <div class="container" data-existing-image-url="${existingImageUrl}">
            <h1>Edit View with Image Preview</h1>
            <input type="file" id="editFileInput" accept="image/*">
            <input type="text" id="fileName" value="No file chosen" readonly>
            <button id="selectFileButton" type="button">Upload</button>
            <div id="preview" class="preview">
                <img id="previewImage" src="${existingImageUrl}" alt="File Preview">
                <div id="closeIcon" class="close-icon">&times;</div>
            </div>
        </div>
    `;
    document.getElementById('dynamicContainer').innerHTML = containerHTML;
    initializeContainerFunctions(); // Initialize functionality
}

// Function to initialize all functionalities
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
