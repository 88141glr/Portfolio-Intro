function countCharacters(element) {
    const charCountElement = document.getElementById('charCount');
    const submitButton = document.getElementById('submitBtn');
    const maxLength = element.getAttribute('maxlength');
    const currentLength = element.value.length;

    charCountElement.textContent = `${currentLength} / ${maxLength} characters`;

    if (currentLength > maxLength) {
        charCountElement.style.color = 'red';
        submitButton.disabled = true;
    } else {
        charCountElement.style.color = ''; // Reset the color
        submitButton.disabled = false;
    }
}