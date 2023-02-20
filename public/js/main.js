
$(document).ready(function(){
    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background', 'linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(' + bg + ') no-repeat center center /cover');
    });
    $('.banniere').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background', 'linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(' + bg + ') no-repeat center center /cover');
    });

    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background', 'linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(' + bg + ') no-repeat center center /cover');
    });


    $('#menu-toggle').click(function(){
        $('.nav-mobile').toggleClass('active');
    })

    $('#close-btn').click(function(){
        $('.nav-mobile').toggleClass('active');
    })
    /*------------------
        DataTable
    --------------------*/

    $('#user-dashboard').DataTable();

    $('#user-historique').DataTable({
        "bFilter": false,
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });

    $('.more-button,.body-overlay').on('click', function () {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
    });

    $('#menu-btn').click(function(){
        $('#menu').toggleClass("active")
    })


    /*Show picture upload */
    let input = document.querySelector('#add_pic');
    let img = document.querySelector('#image_profile');

    input.addEventListener('change',()=>{
        let file = input.files[0];

        let btn = document.querySelector('#btn-add-pic');

        if(file){
            console.log(file);
            let reader = new FileReader();
            reader.addEventListener('load',() => img.src = reader.result);
            reader.readAsDataURL(file);
            btn.classList.add('file');
        }else {
            img.src = "img/user.png";
            btn.classList.remove('file');
        }
    })

})

const boxes = document.querySelectorAll(['.col-content','.box-tarif'])
window.addEventListener('scroll', checkBoxes)
checkBoxes()
function checkBoxes (){
    const triggerBottom = window.innerHeight /5 * 4
    boxes.forEach(box => {
        const boxTop = box.getBoundingClientRect().top
        if(boxTop< triggerBottom){
            box.classList.add('show')
        }else{
            box.classList.remove('show')
        }
    })
}


const boxe_text = document.querySelectorAll(['.about-text'])
window.addEventListener('scroll', textBoxes)
textBoxes()
function textBoxes (){
    const triggerBottom = window.innerHeight /5 * 4
    boxe_text.forEach(box => {
        const boxTop = box.getBoundingClientRect().top
        if(boxTop < triggerBottom){

            box.classList.add('show')
        }
    })
}


function sectionTotal(){
    var passager = document.getElementById("passager").value;
    var price = document.getElementById("price").value;

    var selectedOption = document.getElementById("itineraire");
    var itineraire = document.getElementById("itineraire").children;

    for(var i = 0; i < itineraire.length; i++) {
        if(itineraire[i].tagName == 'INPUT') {
            if(itineraire[i].id == selectedOption) {
                console.log('L\'input choisi est : '+selectedOption );
            }
        }
    }

    document.getElementById("nbr_passager").innerHTML = passager;
    document.getElementById("total_reservation").innerHTML = passager * price;
}
