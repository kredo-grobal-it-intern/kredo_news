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
const americaCheckboxAll = document.querySelector('.America-checkbox-all');
const americaCheckboxList = document.querySelectorAll('.America-checkbox');
const asiaCheckboxAll = document.querySelector('.Asia-checkbox-all');
const asiaCheckboxList = document.querySelectorAll('.Asia-checkbox');
const europeCheckboxAll = document.querySelector('.Europe-checkbox-all');
const europeCheckboxList = document.querySelectorAll('.Europe-checkbox');
const oceaniaCheckboxAll = document.querySelector('.Oceania-checkbox-all');
const oceaniaCheckboxList = document.querySelectorAll('.Oceania-checkbox');
const africaCheckboxAll = document.querySelector('.Africa-checkbox-all');
const africaCheckboxList = document.querySelectorAll('.Africa-checkbox');

mediaCheckboxAll.addEventListener('change', {list: mediaCheckboxList, handleEvent: changeAll});
americaCheckboxAll.addEventListener('change', {list: americaCheckboxList, handleEvent: changeAll});
asiaCheckboxAll.addEventListener('change', {list: asiaCheckboxList, handleEvent: changeAll});
europeCheckboxAll.addEventListener('change', {list: europeCheckboxList, handleEvent: changeAll});
oceaniaCheckboxAll.addEventListener('change', {list: oceaniaCheckboxList, handleEvent: changeAll});
africaCheckboxAll.addEventListener('change', {list: africaCheckboxList, handleEvent: changeAll});

function changeAll(event) {
    if (event.target.checked) {
        addCheck(this.list);
    } else {
        removeCheck(this.list);
    }
}

function addCheck(list) {
    for (let i in list) {
        if (list.hasOwnProperty(i)) {
            list[i].checked = true;
        }
    }
}

function removeCheck(list) {
    for (let i in list) {
        if (list.hasOwnProperty(i)) {
            list[i].checked = false;
        }
    }
}