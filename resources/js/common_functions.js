require('./bootstrap');

window.show_popup = function (message) {
    $("#modal-body").html(message)
    $("#pop-message").modal({
    keyboard: true,
    focus: true,
    show: true
    })
}

window.show_message = function(text="your message",title="Info",icon="info",button="ok"){
    swal({
      title: title,
      text: text,
      icon: icon,
      button: button,
    })
}

window.popup_message = function(d){
    if(debug){
        console.error(d)
        console.error(typeof d)
    }
    if(Array.isArray(d)){
        show_message(text=d[0])
    }
    else if (typeof d === "object"){
        show_message(text=err_msg)
    }
    else if(typeof d === "json"){
        var d = JSON.parse(d.responseText).errors;

        if(typeof d == "string"){
              show_message(text=d)
        }else if(Array.isArray(d) && d.length > 1){
            show_message(text=d[0])
        }
        else if(typeof d == "object"){
            if(d["course_img"]){
                if(Array.isArray(d["course_img"])){
                    show_message(text= d["course_img"][0])
                }
                else if(typeof d == "string"){
                    show_message(text=d["course_img"])
                }
            }
        }

    }else if(typeof d === "string"){
        show_message(text=d)
    }
}

// Function to toggle the dropdown state
window.toggleDropdown = function(toggleEl, state=false) {
    if(debug){
        console.log(`before`)
        console.log(state)
        console.log(toggleEl)
        console.log(dash_lines)
    }
    state = !state;
    if(debug){
        console.log(`after`)
        console.log(state)
    }
    toggleEl.toggleClass('hidden')
    if(debug){
        console.log(toggleEl)
        console.log(dash_lines)
    }
}

window.searchDropDown = function(searchInput,
        dropdownMenu
) {
    let searchTerm = searchInput.val().toLowerCase();
    let items = dropdownMenu.children('p');
    console.log(items)
    if(items.length > 0){
        items.each((_,item) => {
            if(debug){
                console.log(item)
            }
            const text = $(item).text().toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }else{
        if(debug){
            console.log(`items length ${items.length}`)
        }
    }
}

window.showImage = function(input,show_images_el="show_images") {
    if (input.files && input.files.length > 0){
        const reader = new FileReader();
        for (let img of input.files){
            reader.onload = function (e) {
                $(`.${show_images_el}`)
                    .append(`<img src=${reader.result} width="150" class="pr-4"/>`)
            }
            reader.readAsDataURL(img);
        }
    }
}