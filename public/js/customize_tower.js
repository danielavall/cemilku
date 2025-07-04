var current_layer = 1;

const url = "http://127.0.0.1:8000/";

var priceLayer1 = 0;
var priceLayer2 = 0;
var priceLayer3 = 0;
var priceLayer4 = 0;
var priceDecor = 0;
var tempTotalPrice = 0;

function setCurrentLayer(currentLayer){
    current_layer = currentLayer;

    for(var i = 1; i <= 4; i++){
        var snack_layer = "snack-layer-"+i;
        document.getElementById(snack_layer).style.display = "none";
    }

    document.getElementById("snack-layer-"+currentLayer).style.display = "block";
}

function changePreview(imageName, itemPrice, idItem){
    if(current_layer == 1){
        document.getElementById("preview-tower-1").src = url+"assets/tower_layer_1/"+imageName;
        priceLayer1 = itemPrice;
        document.getElementById("snack-1").value = idItem;
    }else if(current_layer == 2){
        document.getElementById("preview-tower-2").src = url+"assets/tower_layer_2/"+imageName;
        priceLayer2 = itemPrice;
        document.getElementById("snack-2").value = idItem;
    }else if(current_layer == 3){
        document.getElementById("preview-tower-3").src = url+"assets/tower_layer_3/"+imageName;
        priceLayer3 = itemPrice;
        document.getElementById("snack-3").value = idItem;
    }else{
        document.getElementById("preview-tower-4").src = url+"assets/tower_layer_4/"+imageName;
        priceLayer4 = itemPrice;
        document.getElementById("snack-4").value = idItem;
    }

    tempTotalPrice = priceLayer1 + priceLayer2 + priceLayer3 + priceLayer4 + priceDecor;

    document.getElementById("temp_price1").textContent = tempTotalPrice.toLocaleString("id-ID");
    document.getElementById("temp_price2").textContent = tempTotalPrice.toLocaleString("id-ID");
    document.getElementById("temp_price3").textContent = tempTotalPrice.toLocaleString("id-ID");
}

var currentProgress = 0;

function controlProgress(state){
    customize_menu = document.getElementById("customize-menu");

    if(state == 'prev'){
        if(currentProgress != 0){
            currentProgress = currentProgress + 100;
            customize_menu.style.marginLeft = currentProgress+"%";
        }
    }else if(state == 'next'){
        if(currentProgress != -300){
            currentProgress = currentProgress - 100;
            customize_menu.style.marginLeft = currentProgress+"%";
        }
    }

    node_1 = document.getElementById("progress-node-1");
    node_2 = document.getElementById("progress-node-2");
    node_3 = document.getElementById("progress-node-3");

    if(currentProgress == 0){
        node_1.className = "progress-node";
        node_2.className = "progress-node";
        node_3.className = "progress-node";
    }else if(currentProgress == -100){
        node_1.className = node_1.className+" progress-node-done";
        node_2.className = "progress-node";
        node_3.className = "progress-node";
    }else if(currentProgress == -200){
        node_2.className = node_2.className+" progress-node-done";
        node_3.className = "progress-node";
    }else if(currentProgress == -300){
        node_3.className = node_3.className+" progress-node-done";
        document.getElementById("customize-price").value = tempTotalPrice;
    }
}

function previewLayer(layer){
    const tower_layer_1 = document.getElementById("tower-layer-1");
    const tower_layer_2 = document.getElementById("tower-layer-2");
    const tower_layer_3 = document.getElementById("tower-layer-3");
    const tower_layer_4 = document.getElementById("tower-layer-4");

    if(layer == 2){
        tower_layer_1.style.display = 'block';
        tower_layer_2.style.display = 'block';
        tower_layer_3.style.display = "none";
        tower_layer_4.style.display = "none";
    }else if(layer == 3){
        tower_layer_1.style.display = "block";
        tower_layer_2.style.display = "block";
        tower_layer_3.style.display = "block";
        tower_layer_4.style.display = "none";
    }else{
        tower_layer_1.style.display = "block";
        tower_layer_2.style.display = "block";
        tower_layer_3.style.display = "block";
        tower_layer_4.style.display = "block";
    }

    document.getElementById("layer-selected").value = layer;
    controlProgress('next');
}

function previewDecoration(decorName, itemPrice, idItem){

    decor = document.getElementById("preview-tower-decor");
    decorPreview = document.getElementById("tower-decor");

    decorPreview.style.display = "block";
    decor.src = url+"assets/decoration/"+decorName;

    priceDecor = itemPrice;
    tempTotalPrice = priceLayer1 + priceLayer2 + priceLayer3 + priceLayer4 + priceDecor;

    document.getElementById("decoration").value = idItem;

    document.getElementById("temp_price1").textContent = tempTotalPrice.toLocaleString("id-ID");
    document.getElementById("temp_price2").textContent = tempTotalPrice.toLocaleString("id-ID");
    document.getElementById("temp_price3").textContent = tempTotalPrice.toLocaleString("id-ID");
}
