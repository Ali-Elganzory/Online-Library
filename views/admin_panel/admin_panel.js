let active = "";
let book_being_edited = "";
let start = 0;
let end = 21;

function openForm(id, picid) {
    let form = document.getElementById(id);
    form.style.display = "block";
    const reflow1 = document.getElementById(id).offsetHeight;
    form.style.height = "270px";
    let dimbg = document.getElementById("dimbg");
    dimbg.style.display = "block";
    const reflow2 = dimbg.offsetHeight;
    dimbg.style.opacity = "1";
    book_being_edited = picid;
    var newUrl = document.getElementById('editpic').action;
    newUrl = newUrl.replace("id", );
    document.getElementById('editpic').href = book_being_edited;
    active = id;
}
function closeForm(id) {
    document.getElementById(id).style.display = "none";
    document.getElementById(id).style.height = "250px";
    document.getElementById("dimbg").style.display = "none";
    document.getElementById("dimbg").style.opacity = "0";
    document.getElementsByName(id)[0].reset();
    return false;
}

function turn_page(page_no){

}


///// Image Uploader /////
$(document).ready(function () {
    let file_uploader = document.getElementById('formFileLg');
    const token = Cookies.get('token');
    const headers = {
        "Authorization": `Bearer ${token}`,
        "Content-Type": "application/json",
        "Accept": "application/json",
    }
    file_uploader.onchange = function(event) {
        let image = document.getElementById(book_being_edited.toString());
        let file = file_uploader.files[0];
        //console.log(file);
        //let imageURL = URL.createObjectURL(file);
        //var form = document.getElementById('editpic');
        var formdata = new FormData();
        formdata.append("image", file);
        console.log(formdata);
        $.ajax({
            url: `api/changeBookPic/${book_being_edited}`,
            type: 'POST',
            data: formdata,
            headers: headers,
            cache: false,
            contentType: false,
            processData: false,
            success: res => {
                closeForm(active);
                console.log(res);
                const jwt = res.json();
                image.src = jwt.image_url;
            },
        })
    }

});


