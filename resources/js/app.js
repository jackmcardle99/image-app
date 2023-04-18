import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

//this is for jquery flash messaging
$(document).ready(function(){
    setTimeout(function () {
        $(".flashmessage").slideUp('slow');
    }, 3000);
});

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
