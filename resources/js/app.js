import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


//this code is for the CK Editor for adding new notes
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import AutoformatPlugin from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
import BlockQuotePlugin from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';
import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import on from "alpinejs/src/utils/on";


ClassicEditor
    .create( document.querySelector( '#summary'), {
        // The plugins are now passed directly to .create().
        plugins: [
            EssentialsPlugin,
            AutoformatPlugin,
            BoldPlugin,
            ItalicPlugin,
            BlockQuotePlugin,
            HeadingPlugin,
            LinkPlugin,
            ListPlugin,
            ParagraphPlugin,
        ],

        // So is the rest of the default configuration.
        toolbar: [
            'heading',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            'blockQuote',
            'undo',
            'redo'
        ]
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

//this is for jquery flash messaging
$(document).ready(function(){
    setTimeout(function () {
        $(".flashmessage").slideUp('slow');
    }, 3000);
});


// function getTableData(table) {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//             // Handle the response data here
//             var responseData = xhr.responseText;
//             document.getElementById('table-container').innerHTML = responseData;
//         }
//     };
//     xhr.open('GET', '/admin/' + table);
//     xhr.send();
// }

// function getTableData(table) {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 // Handle the response data here
//                 var responseData = JSON.parse(xhr.responseText);
//                 document.getElementById('table-container').innerHTML = responseData.tableHtml;
//             } else {
//                 console.error('Error retrieving table data');
//             }
//         }
//     };
//     xhr.open('GET', '/admin/' + table);
//     xhr.send();
// }
//
// document.getElementById('table-select').addEventListener('change', function(event) {
//     event.preventDefault();
//     var selectedTable = this.value;
//     if (selectedTable) {
//         getTableData(selectedTable);
//     }
// });














//Add an event listener to the form submit button
// document.getElementById('table-select').addEventListener('change', function(event) {
//     event.preventDefault(); // Prevent the form from submitting normally
//     var formData = new FormData(document.getElementById('table-form'));
//
//     // Send an Ajax request to update the table content
//     axios.post('/admin', formData)
//         .then(function(response) {
//             // Update the table content with the data received from the server
//             document.getElementById('table-content').innerHTML = response.data;
//         })
//         .catch(function(error) {
//             console.log(error);
//         });
// });

//Variables for each table

// event listener to the form select input
document.getElementById('table-form').addEventListener('change', function(event) {
    event.preventDefault();
    const postsTable = document.getElementById('postsTable');
    const commentsTable = document.getElementById('commentsTable');
    const usersTable = document.getElementById('usersTable');

    // const postsTable = 'postsTable'
    //
    postsTable.style.display = 'none';
    commentsTable.style.display = 'none';
    //usersTable.style.display = 'none';


    var e = document.getElementById("table-select");
    var selectedEquipmentDropdown = e.options[e.selectedIndex].value; //change it here
    var selectedTableId = selectedEquipmentDropdown + 'Table';
    var selectedTable = document.getElementById(selectedTableId);
    selectedTable.style.display = 'table';
});





