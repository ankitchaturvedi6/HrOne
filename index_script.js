'use strict'
const approvalItemsEl = document.getElementById('Approval-items');
const requestItemsEl = document.getElementById('Request-items');
const approvalEl = document.getElementById('Approval');
const requestEl = document.getElementById('Request');
// const profileEl = document.querySelector('.nav-bar-top-right-profile');



/*
 *function to show and hide the list navigation items
 */

const showListEl = function () {

    const listItem = this.lastElementChild;
    /*
     *select all the navigation list items
     *if the selected item is not qual to @param[listItem]
     *then add the class hidden show that one list can be visible at
     *one time
     */
    const allListEl = document.querySelectorAll('.list-items');

    const len = allListEl.length;

    for (let i = 0; i < len; i++) {
        if (!allListEl[i].classList.contains('hidden') && allListEl[i] !== listItem) {
            allListEl[i].classList.add('hidden');
        }

    }
    if (listItem.classList.contains('hidden')) {
        listItem.classList.remove('hidden');
    } else {
        listItem.classList.add('hidden');
    }

}

approvalEl.addEventListener('click', showListEl);
requestEl.addEventListener('click', showListEl);


const showProfileModel = function (event) {
    const elm = document.getElementById('profile-menu');

    if (!elm.classList.contains('hidden')) {
        elm.classList.add('hidden');
    } else {
        elm.classList.remove('hidden');
    }
    event.stopPropagation();

}


// profileEl.addEventListener('click', showProfileModel);

// document.body.addEventListener('click', function () {
//     const elm = document.getElementById('profile-menu');
//     if (!elm.classList.contains('hidden')) {
//         elm.classList.add('hidden');
//     }
// })

const reqAttendanceEl = document.getElementById("Request-items__Attendance");
const homeEl = document.getElementById("item-home");
const mainContentEl = document.getElementById("main-inner-content");


reqAttendanceEl.addEventListener('click', function (event) {

})