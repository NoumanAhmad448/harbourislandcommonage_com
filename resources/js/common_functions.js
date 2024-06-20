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
    if(!text){
        text = err_msg
    }
    if(debug && text == err_msg){
        console.log("no output is given")
    }

    swal({
        title: title,
        text: text,
        icon: icon,
        button: button,
    })
}

window.popup_message = function(d){
    if(debug){
        console.log(d)
        console.log(typeof d)
    }
    if(Array.isArray(d)){
        show_message(text=d[0])
    }
    else if (typeof d === "object"){
        try {
            var dd = JSON.parse(d.responseText);
            if(debug){
                console.log(dd)
            }
            if(debug){
                console.log(api_is_success in dd)
                console.log(dd && "error" in dd || "errors" in dd)
            }
            if(dd && "error" in dd){
                d = dd.error
            }
            else if("errors" in dd){
                d = dd.errors
            }
            else if(api_is_success in dd){
                if(debug){
                    console.log(dd)
                }
                d = dd[api_message]
            }
            else if(api_message in dd){
                if(debug){
                    console.log(dd)
                }
                d = dd[api_message]
                show_message(text=d)
            }
            else{
                d = dd
            }
        } catch (e) {
            if(debug){
                console.log(api_is_success in d)
            }
            if(api_is_success in d){
                console.log(d)
                if(debug){
                    console.log(d)
                }
                d = d[api_message]
                console.log(d)
                show_message(text=d)
            }else{
                show_message(text=err_msg)
            }
        }

        if(typeof d == "string"){
              show_message(text=d)
        }else if(Array.isArray(d) && d.length > 0){
            show_message(text=d[0])
        }
        else if(typeof d == "object"){
            console.log(d)
            let msg = "";
            let counter = 0
            for (const key in d){
                counter+=1
                if(Array.isArray(d[key])){
                    msg += `${counter}- ${d[key][0]}\n`
                }
                else if(typeof d == "string"){
                    msg += `${counter}- ${d[key]}\n`
                }
            }
            show_message(msg)
        }else{
            show_message(text=err_msg)
        }
    }
    else if(typeof d === "string"){
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

window.showImage = function(input,show_images_el="show_images",validImageTypes=false) {
    let files = input.files
    if (files && files.length > 0){
        $(`.${show_images_el}`).text("")
        if(!validImageTypes){
            var validImageTypes = img_val_rules ;
            }
        for (let file of files){
            const reader = new FileReader();
            var fileType = file["type"];

            if ($.inArray(fileType, validImageTypes) < 0) {
                popup_message(file_upload_ft)
                $(`.${show_images_el}`).text("")
                } else if (file['size'] / 1024 / 1024 == fuas) {
                popup_message(fuasm)
                $(`.${show_images_el}`).text("")
                }
            else{
            reader.fileName = file.name
            reader.onload = function (e) {
                $(`.${show_images_el}`)
                    .append(`<img
                    id='${file.lastModified}img'
                    src=${reader.result} width="150" height="150" class="pr-4 rounded-lg
                    transition-all duration-300 cursor-pointer
                    h-auto max-w-lg
                    "/>`)
                    }
                    reader.readAsDataURL(file)}
                    }
    }
    }
window.changeURL = function(newUrl) {
    if(debug){
        console.log(newUrl)
    }
    document.location.href = newUrl;
}

window.dataTable = function(table, cConfig={}){
    let config = {}
    config['language'] = {
            searchPlaceholder: "Search records"
        }
    config["pageLength"] = "pageLength" in cConfig ? cConfig["pageLength"] : 25

    if("order" in cConfig){
        config["order"] = [
            ["col_no" in cConfig["order"] ?
            cConfig["order"]["col_no"] : 1 ,"desc"]
       ]
    }

    config["scrollX"]= true

    if(debug){
        console.log(config)
    }
    return $(`#${table}`).DataTable(config);
}

window.debug_logs = function(whatever){
    if(debug){
        console.log(whatever)
    }
}