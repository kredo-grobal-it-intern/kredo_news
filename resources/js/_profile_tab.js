const tabButtons = document.getElementsByClassName('profile-btn-tab');
const likedNews = document.getElementById('liked-news');
const bookmarkedNews = document.getElementById('bookmarked-news');
for (let i=0; i<tabButtons.length; i++) {
    tabButtons[i].addEventListener('click', tabSwitch, false);
}

function tabSwitch() {
    document.getElementsByClassName('is-active')[0].classList.remove('is-active');
    this.classList.add('is-active');
    likedNews.classList.toggle('d-none');
    bookmarkedNews.classList.toggle('d-none');
}