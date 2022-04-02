var data_info; 
var list_of_products = new Array();


window.addEventListener('load', addEventListenerTop);
     


function topFunction() {
	var navButton = document.getElementsByClassName("navbar-toggler float-right")[0];
	if(navButton.getAttribute('aria-expanded') == 'false'){
		document.body.scrollTop = 0;
  		document.documentElement.scrollTop = 0;
	}
} 

function product(name, id, origin, discount_price, regular_price, description, image_ref, aisle, aisle_location, numOfItems, quantity) {
	this.name = name;
	this.id = id;
	this.origin = origin;
	this.discount_price = discount_price;
	this.regular_price = regular_price;
	this.description = description;
	this.image_ref = image_ref;
	this.aisle = aisle;
	this.numOfItems = numOfItems;
	this.quantity = quantity;
	this.aisle_location = aisle_location;
}



function loadDoc() {
	const xhttp = new XMLHttpRequest();
	xhttp.open("GET","database.txt", true);
	xhttp.onload = function() {
		var json = JSON.parse(xhttp.responseText);
		toArray(json);
		};
	xhttp.send();
    	
}

function toArray(data) {
	for(let i = 0; i < data.length; i++)
		{
			var temp = new product(data[i].name, i, data[i].origin, data[i].discount_price, data[i].regular_price, data[i].description, data[i].image_ref, data[i].aisle, data[i].aisle_location, data[i].numOfItems, data[i].quantity);
			list_of_products.push(temp);
			console.log(list_of_products[i]);
		}
	productMatch(list_of_products);

}

function productMatch(list_of_products) {
	var name = document.getElementsByTagName("body")[0].id;
	for(let i = 0; i < list_of_products.length; i++)
		if(list_of_products[i].name == name)
		{
			var element = list_of_products[i];
			console.log(element);
			break;
		}	
	content(element);
}

function content(element) {
	var price = null;
	element.regular_price = (Math.round(element.regular_price * 100) / 100).toFixed(2);
	if(element.discount_price == null){
		price = element.regular_price;
		document.getElementById("target_spot").innerHTML = 
			'<div class="row">'+
				'<div class="col-md-12 mt-4">'+
					'<a class="prev-nav" href="index.html">Home</a><a> / </a><a class="prev-nav" href="'+element.aisle_location+'">' + element.aisle + '</a><a> / </a><a>'+element.name+'</a>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<span class="col-md-8 row">'+
					'<div class="col-md mt-4 mb-4">'+
						'<span class="justify-content-center image-product-page-container"><img src="'+element.image_ref+'" class="image-product-page"></img></span>'+
					'</div>'+
					'<div class="col-md">'+
						'<p class="item-page-name mt-3">'+element.name+'</p>'+
						'<p class="number-of-items">'+element.numOfItems+'</p>'+
						'<p class="price-name mb-0">'+element.regular_price+'$</p>'+
						'<p class="company-name-2">Quantity</p>'+
						'<form action= "PHP FILE FOR LATER!">'+
							'<input class="quantity-input-2 mr-1" type="number" id="quantity" name="'+element.name+'" min="1" max="99" value="" onload="calTotalPrice(value, '+element.discount_price+');" onchange="storeData(name, value); calTotalPrice(value, '+element.regular_price+');">'+
							'<button class="justify-content-center mt-0 pb-1" id="quantity_button" onclick="addToCart();" type="button">ADD TO CART</button>'+
						'</form>'+
						'<p class="price-name" id="total-price"><p>'+
					'</div>'+
				'</span>'+
				'<div class="col-md">'+
					'<button class="accordion mb-2" id="description_button">(+)Description:</button>'+
						'<div class="outer">'+
							'<p class="description2">'+element.description+'</p>'+
						'</div>'+
				'</div>'+
			'</div>';
	} else {
		element.discount_price = (Math.round(element.discount_price * 100) / 100).toFixed(2);
		price = element.discount_price;
		document.getElementById("target_spot").innerHTML = 
			'<div class="row">'+
				'<div class="col-md-12 mt-4">'+
					'<a class="prev-nav" href="index.html">Home</a><a> / </a><a class="prev-nav" onclick="changeId();" href="'+element.aisle_location+'">' + element.aisle + '</a><a> / </a><a>'+element.name+'</a>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<span class="col-md-8 row">'+
					'<div class="col-md mt-4 mb-4">'+
						'<span class="justify-content-center image-product-page-container"><img src="'+element.image_ref+'" class="image-product-page"></img></span>'+
					'</div>'+
					'<div class="col-md">'+
						'<p class="item-page-name mt-3">'+element.name+'</p>'+
						'<p class="number-of-items">'+element.numOfItems+'</p>'+
						'<p class="price-discount-name">'+element.discount_price+'$</p>'+
						'<p class="regular-price-name mb-0">'+element.regular_price+'$</p>'+
						'<p class="company-name-2">Quantity</p>'+
						'<form action= "PHP FILE FOR LATER!">'+
							'<input class="quantity-input-2 mr-1" type="number" id="quantity" name="'+element.name+'" min="1" max="99" value="" onload="calTotalPrice(value, '+element.discount_price+');" onchange="storeData(name, value); calTotalPrice(value, '+element.discount_price+');">'+
							'<button class="justify-content-center mt-0 pb-1" id="quantity_button" onclick="addToCart();" type="button">ADD TO CART</button>'+
						'</form>'+
						'<p class="price-name" id="total-price"><p>'+
					'</div>'+
				'</span>'+
				'<div class="col-md">'+
					'<button class="accordion mb-2" id="description_button">(+)Description:</button>'+
						'<div class="outer">'+
							'<p class="description2">'+element.description+'</p>'+
						'</div>'+
				'</div>'+
			'</div>';	
	}
	addEventListenerToElement();
	calTotalPrice(document.getElementById("quantity").value, price);
}

function addEventListenerToElement(){
	document.getElementById('description_button').addEventListener('click', displayDescription);
	loadPData();
}


function addEventListenerTop(){
	var navButton = document.getElementsByClassName("navbar-toggler float-right")[0];
	navButton.addEventListener('click', topFunction);
}

function displayDescription(){
    this.classList.toggle("active");
    var target_button = document.getElementById('description_button');
	if(target_button.classList.contains('active'))
		target_button.innerHTML = "(-)Description:";
	else {
		target_button.innerHTML = "(+)Description:"
	}
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
    } else {
        panel.style.display = "block";
        }
}

function calTotalPrice(quant, price){
	var Tprice = (Number(quant)*Number(price));
	Tprice = (Math.round(Tprice * 100) / 100).toFixed(2)
	if(quant == 0 || quant === null)
		document.getElementById("total-price").innerHTML = "";
	else{
		document.getElementById("total-price").innerHTML = Tprice+"$";
	}
	
}

function storeData(name, value)
    {
      sessionStorage.setItem(name, value);
    }

function loadPData()
{
  { 
  	var body = document.getElementsByTagName("body")[0].id;
    document.getElementById("quantity").value = sessionStorage.getItem(body);
  }
}


function addToCart(){
    var body = document.getElementsByTagName("body")[0].id;
    var desiredQuantity = sessionStorage.getItem("@"+body);
    var addedQuantity = sessionStorage.getItem(body);
    alert(addedQuantity + " " + body + " have been added to your cart!");
	sessionStorage.setItem("@"+body,Number(desiredQuantity) + Number(document.getElementById("quantity").value));    	
}
