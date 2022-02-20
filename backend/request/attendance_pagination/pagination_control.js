'use strict'

let maxNoOfPages;

let noOfRows = 10;

console.log(`${noOfRows}`);


function selectedPage(elem) {
    var elems = document.querySelectorAll(".selected-page");

    [].forEach.call(elems, function (el) {
        el.classList.remove("selected-page");
    });

    elem.classList.add('selected-page')
}

function showNoOfPages() {

    const startPageNo = Number(document.getElementById('page-1').innerHTML);
    const maxNoOnPage = 4; // total pages we can show on 

    let currentPage = startPageNo;

    for (let i = 0; i < maxNoOnPage; i++) {

        if (i === maxNoOnPage - 1) {
            // show the next button;
            document.getElementById('page-next').style.display = 'none';
        } else {
            //show the different pages;
            let pageId = 'page-' + (i + 1);
            console.log(`page id is ${pageId}`);
            document.getElementById(pageId).style.display = 'none';
        }


    }
    console.log(`currentPage ${maxNoOfPages}`);


    for (let i = 0; i < maxNoOnPage && currentPage <= maxNoOfPages; i++) {


        if (i === maxNoOnPage - 1) {
            // show the next button;
            document.getElementById('page-next').style.display = 'inline-block';
        } else {
            //show the different pages;
            let pageId = 'page-' + (i + 1);
            document.getElementById(pageId).style.display = 'inline-block';
        }
        ++currentPage;

    }





}




function fetchData(pageNo) {
    console.log('no of times it get called');

    console.log(pageNo);
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {


            if (pageNo !== 1) {
                document.getElementById("content-table").innerHTML = this.responseText;
                // showAvailablePages();
            } else {
                const jsonContent = JSON.parse(this.responseText);
                const maxContent = Number(jsonContent.maxPage);
                maxNoOfPages = Math.ceil(maxContent / noOfRows);


                showNoOfPages();

                document.getElementById("content-table").innerHTML = jsonContent.values;

            }
        }
    };
    xmlhttp.open("GET", "backend/request/attendance_pagination/pagination.php?Page=" + pageNo + "&Row=" + noOfRows, true);
    xmlhttp.send();







}

fetchData(1);



function pageFirst() {
    let elem = document.getElementById('page-1');

    let pageNo = Number(String(elem.innerHTML));

    selectedPage(elem)

    fetchData(pageNo);
}


function pageSecond() {
    let elem = document.getElementById('page-2');

    let pageNo = Number(String(elem.innerHTML));

    selectedPage(elem)

    fetchData(pageNo);
}

function pageThird() {
    let elem = document.getElementById('page-3');

    let pageNo = Number(String(elem.innerHTML));

    selectedPage(elem)
    fetchData(pageNo);
}

/*
    it should change the page values start 
    from 1 to 3 and show the details.
*/


function pageNext() {
    let elem = document.getElementById('page-next');

    let pageElem = document.getElementById('page-1');

    let pageNo = Number(String(pageElem.innerHTML));


    document.getElementById('page-1').innerHTML = `${pageNo+2+1}`;

    document.getElementById('page-2').innerHTML = `${pageNo+2+2}`;

    document.getElementById('page-3').innerHTML = `${pageNo+2+3}`;

    document.getElementById('page-prev').style.display = 'inline-block';

    showNoOfPages();

    selectedPage(document.getElementById('page-1'))

    fetchData(pageNo + 3);
}


/*

    show prev pages

*/

function pagePrev() {

    let pageElem = document.getElementById('page-1');

    let pageNo = Number(String(pageElem.innerHTML));


    document.getElementById('page-3').innerHTML = `${pageNo-1}`;
    document.getElementById('page-3').style.display = 'inline-block';

    document.getElementById('page-2').innerHTML = `${pageNo-2}`;
    document.getElementById('page-2').style.display = 'inline-block';

    document.getElementById('page-1').innerHTML = `${pageNo-3}`;
    document.getElementById('page-1').style.display = 'inline-block';

    document.getElementById('page-next').style.display = 'inline-block';

    if ((pageNo - 3) === 1)
        document.getElementById('page-prev').style.display = 'none';

    selectedPage(document.getElementById('page-3'))


    fetchData(pageNo - 1);


}



function getNoOfRows() {


    const str = Number(document.getElementById('row-content').value);

    console.log(`no of rows ${str}`);
    if (str.length != 0) {

        if (!isNaN(str) && str >= 1 && str <= 10) {
            noOfRows = Number(str);


            document.getElementById('page-1').innerHTML = `1`;
            document.getElementById('page-1').style.display = 'inline-block';
            document.getElementById('page-2').innerHTML = `2`;
            document.getElementById('page-2').style.display = 'inline-block';

            document.getElementById('page-3').innerHTML = `3`;
            document.getElementById('page-3').style.display = 'inline-block';
            document.getElementById('page-prev').style.display = 'none';
            selectedPage(document.getElementById('page-1'))
            showNoOfPages()
            pageFirst();
        } else {
            alert("Enter between 1 to 10")
        }
    }

}