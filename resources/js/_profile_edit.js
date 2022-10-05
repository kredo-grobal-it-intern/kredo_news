$(function () {

    $('#avatar').on('change', function(e) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#showAvatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

const mediaCheckboxAll = document.querySelector('.media-checkbox-all');
const mediaCheckboxList = document.querySelectorAll('.media-checkbox');

mediaCheckboxAll.addEventListener('change', changeAll);

function changeAll() {
    if (mediaCheckboxAll.checked) {
        for (let i in mediaCheckboxList) {
            if (mediaCheckboxList.hasOwnProperty(i)) {
                mediaCheckboxList[i].checked = true;
            }
        }
    } else {
        for (let i in mediaCheckboxList) {
            if (mediaCheckboxList.hasOwnProperty(i)) {
                mediaCheckboxList[i].checked = false;
            }
        }
    }
}
