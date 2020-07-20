//Исходный адрес сайта
var siteURL = "http://business-assistant.local/shop/";

/********************************************************
                Кнопка показать еще
********************************************************/
var btnShowMore = document.querySelector('#show-more');
// если на странице присутствует кнопка Показать еще, то выполняем код
if(btnShowMore) {
	//Функция нажатия на кнопку "Показать еще"
	btnShowMore.onclick = function () {
		var currentPageInput = document.querySelector('#current-page');
		var ajax = new XMLHttpRequest();
		    currentPageInput.value = +currentPageInput.value + 1;
			ajax.open('GET', siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
			ajax.send();

		if(ajax.response == '') {
			btnShowMore.style.display = "none";
		}

		var productsBlock = document.querySelector('#products');
			productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;
	}
}

/********************************************************
           Добавление товаров в избранное
********************************************************/
function addToFavorites(btn) {
	console.dir(btn.dataset.id);

	/*
	1. Сделать ajax запрос на добавление в корзину
	2. Получить данные об успешном добавлении в корзину
	3. Обновить информацию  в корзине
	*/

	var ajax = new XMLHttpRequest();
		ajax.open('POST', siteURL + "modules/favorites/add-favorites.php", false);

		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		ajax.send("id=" + btn.dataset.id);
	//массив добавленых товаров в корзину
	var response = JSON.parse(ajax.response);
	console.dir(response);

	var btnGoFavorites = document.querySelector('#go-favorites span');
		//вывод количества товарок возле иконки корзины
		btnGoFavorites.innerHTML = response.favorites.length;
}

/********************************************************
                    Оформление заказа
********************************************************/
var form = document.querySelector('#form');
form.addOrder = function(event) {
	event.preventDefault();

	var userName = form.querySelector("input[name='userName']"); 
	var email = form.querySelector("input[name='email']"); 
	var id_product = form.querySelector("input[name='id_product']"); 
	var address = form.querySelector("input[name='address']");
	var data = "userName=" + userName.value +
	  			"&email=" + email.value +
	  			"&address=" + address.value +
	  			"&id_product=" + id_product.value +
	  			"&add_order=1";
	var ajax = new XMLHttpRequest();
		ajax.open('POST', form.action, false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(data);

		var response = JSON.parse(ajax.response);
}

/********************************************************
                Удаление товара с избраного
********************************************************/
function deleteProductFavorites(obj, id) {

	var ajax = new XMLHttpRequest();
		ajax.open('POST', siteURL + "modules/favorites/delete.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

	alert('DELETE');

	//удалить строку с товаром
	obj.parentNode.parentNode.remove();
}

/********************************************************
Удаление предложений малого бизнеса в его личном кабинете
********************************************************/
function deleteProductUserB(obj, id) {

	var ajax = new XMLHttpRequest();
		ajax.open('POST', siteURL + "parts/account_b/delete_products.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

	alert('DELETE');

	//удалить строку с товаром
	obj.parentNode.parentNode.remove();
}

/********************************************************
Оформление заявки на добаление предложения от малого бизнеса
********************************************************/
function addRequest(event) {
	event.preventDefault();

	var add_request = document.querySelector('#add_request');
	var title = form.querySelector("input[name='title']"); 
	var description = form.querySelector("input[name='description']"); 
	var content = form.querySelector("textarea[name='content']");
	var category_id = form.querySelector("select[name='category_id']"); 
	var image = form.querySelector("input[name='image']");
	var cost = form.querySelector("input[name='cost']");
	var phone = form.querySelector("input[name='phone']");
	var data = "title=" + title.value +
	  			"&description=" + description.value +
	  			"&content=" + content.value +
	  			"&category_id=" + category_id.value +
	  			"&image=" + image.value +
	  			"&cost=" + cost.value +
	  			"&phone=" + phone.value +
	  			"&add_request=1";
	var ajax = new XMLHttpRequest();
		ajax.open('POST', form.action, false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(data);

	var response = JSON.parse(ajax.response);
}