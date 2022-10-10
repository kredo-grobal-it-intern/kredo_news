const commentArea = document.querySelector('#comment');
const wordCount = document.querySelector('#word-count');
const wordMax = document.querySelector('#word-max').textContent;

commentArea.addEventListener('input', () => {
    let wordLength = commentArea.value.length;
    wordCount.textContent = wordLength;
    if (wordLength > wordMax && !wordCount.classList.contains('text-danger')) {
        wordCount.classList.add('text-danger');
    }
    if (wordCount.classList.contains('text-danger') && wordLength <= wordMax) {
        wordCount.classList.remove('text-danger');
    }
});
