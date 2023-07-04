var addItemId=0;

function addtocart(item)
{
  addItemId +=1;
  var selectedItem=document.createElement('div');
  selectedItem.classList.add('cartImg');
  selectedItem.setAttribute('id',addItemId);
  var img=document.createElement('img');
  img.setAttribute('src',item.children[0].currentSrc);
  var cartItems=document.getElementById('title');
  selectedItem.append(img);
  cartItems.append(selectedItem);
}

const search1 =() =>{
  const fs=document.querySelectorAll(".section-header");
  const searchbox = document.getElementById("search-item").value.toUpperCase();
  const storeitems =document.getElementById("product-list");
  const product =document.querySelectorAll(".card");
  const pname =storeitems.getElementsByTagName("p");
  console.log(fs);
  //fs.style.display="none";
  if(searchbox.length==0)
  {
    for(var i = 0; i <5; i++)
    {
      fs[i].style.display="block";
    }
}
else
{
  for(var i = 0; i <5; i++)
  {
    fs[i].style.display="none";
  }
}

  for (var i = 0; i < pname.length; i++) {
    let match=product[i].getElementsByTagName('p')[0];

    if (match) {
      let textvalue = match.textContent || match.innerHTML

      if (textvalue.toUpperCase().indexOf(searchbox)>-1) {
       product[i].style.display="";
      }
      else{
        product[i].style.display="none";
      }
    }
  }
}

function abc(elementId) {
  const targetDiv = document.getElementById(elementId);
    if (targetDiv.style.display === "none") {
      targetDiv.style.display = "flex";
    }else {
      targetDiv.style.display = "none";
    }
  };
  function abc1(elementId) {
    const targetDiv = document.getElementById(elementId);
        targetDiv.style.display = "none";
    };
  function showDiv() {
     document.getElementById('container1').style.display = "block";
  }
  function showDivs() {
     document.getElementById('container').style.display = "block";
  }






  if (document.readyState == 'loading') {
      document.addEventListener('DOMContentLoaded', ready)
  } else {
      ready()
  }

  function ready() {
      var removeCartItemButtons = document.getElementsByClassName('btn-danger')
      for (var i = 0; i < removeCartItemButtons.length; i++) {
          var button = removeCartItemButtons[i]
          button.addEventListener('click', removeCartItem)
      }

      var quantityInputs = document.getElementsByClassName('cart-quantity-input')
      for (var i = 0; i < quantityInputs.length; i++) {
          var input = quantityInputs[i]
          input.addEventListener('change', quantityChanged)
      }

      var addToCartButtons = document.getElementsByClassName('shop-item-button')
      for (var i = 0; i < addToCartButtons.length; i++) {
          var button = addToCartButtons[i]
          button.addEventListener('click', addToCartClicked)
      }

      //document.getElementsByClassName('btn-purchase').addEventListener('click', purchaseClicked)
  }

  function purchaseClicked() {
      printDiv();
      var cartItems = document.getElementsByClassName('cart-items')[0]
      while (cartItems.hasChildNodes()) {
          cartItems.removeChild(cartItems.firstChild)
      }
      updateCartTotal();
      alert('Thank you for your purchase');

  }

  function purchaseClicked2() {
      printDiv1();
      var cartItems = document.getElementsByClassName('cart-items')[0]
      while (cartItems.hasChildNodes()) {
          cartItems.removeChild(cartItems.firstChild)
      }
      updateCartTotal();
      alert('Thank you for your purchase');

  }


  function removeCartItem(event) {
      var buttonClicked = event.target
      buttonClicked.parentElement.parentElement.remove()
      updateCartTotal()
  }

  function quantityChanged(event) {
      var input = event.target
      if (isNaN(input.value) || input.value <= 0) {
          input.value = 1
      }
      updateCartTotal()
  }

  function addToCartClicked(event) {
      var button = event.target
      var shopItem = button.parentElement.parentElement
      var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
      var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
      var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
      addItemToCart(title, price, imageSrc)
      updateCartTotal()
  }

  function addItemToCart(title, price, imageSrc) {
      var cartRow = document.createElement('div')
      cartRow.classList.add('cart-row')
      alert('Item added to cart!')
      var cartItems = document.getElementsByClassName('cart-items')[0]
      var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
      for (var i = 0; i < cartItemNames.length; i++) {
          if (cartItemNames[i].innerText == title) {
              alert('This item is already added to the cart')
              return
          }
      }
      var cartRowContents = `
          <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title" name="cart-item-title">${title}</span>
          </div>
          <span class="cart-price cart-column">${price}</span>
          <div class="cart-quantity cart-column">
              <input class="cart-quantity-input" type="number" value="1">
              <button class="btn btn-danger" type="button">REMOVE</button>
          </div>`
      cartRow.innerHTML = cartRowContents
      cartItems.append(cartRow)
      cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
      cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
  }






  function updateCartTotal() {
      var cartItemContainer = document.getElementsByClassName('cart-items')[0]
      var cartRows = cartItemContainer.getElementsByClassName('cart-row')
      var total = 0
      for (var i = 0; i < cartRows.length; i++) {
          var cartRow = cartRows[i]
          var priceElement = cartRow.getElementsByClassName('cart-price')[0]
          var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
          var price = parseFloat(priceElement.innerText.replace('$', ''))
          var quantity = quantityElement.value
          total = total + (price * quantity)
      }
      total = Math.round(total * 100) / 100
      document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
  }

          function printDiv(){
            var doc = new jsPDF()
            var btn=document.getElementById("print-div")
            doc.setFontSize(15)
            var cartItemContainer = document.getElementsByClassName('cart-items')[0]
            var cartRows = cartItemContainer.getElementsByClassName('cart-row')
            let bodyData = [];
            var recs=[];
            if(cartRows.length!=0){
            var i=0;
            for (i = 0; i <cartRows.length; i++) {
            var cartRow=cartRows[i]
            var title = cartRow.getElementsByClassName('cart-item-title')[0].innerText
            var price = cartRow.getElementsByClassName('cart-price')[0].innerText
            var quantity = cartRow.getElementsByClassName('cart-quantity-input')[0].value
            var rowData = [];
            var srno=i+1;
            var total='$'+price[1]*quantity;
            var totals=price[1]*quantity;//without $ sign
            var prices=price[1];//
            console.log(price);
            //alert("<?php orderno(); ?>");
            var orderno=Number(document.getElementById('orderno').innerHTML);
            orderno=orderno+1;
            console.log(orderno);
            var email=document.getElementById('email').innerHTML;
            var phoneno=document.getElementById('phoneno').innerHTML;
            var username=document.getElementById('username').innerHTML;
            var address=document.getElementById('address').innerHTML;
            var a={};
            a.title=title;
            a.price=prices;
            a.quantity=quantity;
            a.total=totals;
            a.email=email;
            a.orderno=orderno;
            recs.push(a);
            rowData.push(srno,title,price,quantity,total);
            console.log(rowData)
            bodyData.push(rowData);
}

var total=document.getElementsByClassName('cart-total-price')[0].innerText
var totalamt=[]
totalamt=[{content: "", colSpan: 3,
styles: { fillColor: [255, 255, 255] }
},{content: "Total:" +total, colSpan: 2,
styles: { fillColor: [223, 200, 46] }
}]
bodyData.push(totalamt)


console.log(recs);
$.ajax({
  url:"second0.php",
  method:"post",
  data: {recs: JSON.stringify(recs)},
  success: function(res){
    console.log(res);
  }
})

          doc.autoTable({
          styles : { halign : 'center'}, headStyles :{fillColor : [31, 32, 34]}, alternateRowStyles: {fillColor : [218, 218, 218]}, tableLineColor: [31, 32, 34],margin: { top: 49 },
            head:[['Sr no.','Item-Description','Price','Qty','Total']],
            body:bodyData,
          })
          console.log(bodyData)
          bodyData=[];
          recs=[];
        }

          else {
            doc.text("Nothing to show");
          }
          doc.setFontSize(20)
          doc.text(85,15,"Tasty Bites");
          doc.setFontSize(10)
          doc.text(15,25,"Billed to: "+username);
          doc.text(15,29,"Address: "+address);
          doc.text(15,33,"Phone no: "+phoneno);
          doc.text(15,37,"Email: "+email);
          var date = new Date();
          doc.text(15,41,"Date-Time: "+date);
          doc.text(15,45,"Order No.: "+orderno);
          doc.save('invoice.pdf')
          }




          function printDiv1(){
            var email1=document.getElementById('email1').value;
            var username1=document.getElementById('username1').value;
            var phoneno1=document.getElementById('phoneno1').value;
            var address1=document.getElementById('address1').value;
            console.log(email1);
            console.log(username1);
            console.log(phoneno1);
            console.log(address1);
            var doc = new jsPDF()
            var btn=document.getElementById("print-div")
            doc.setFontSize(10)
            var cartItemContainer = document.getElementsByClassName('cart-items')[0]
            var cartRows = cartItemContainer.getElementsByClassName('cart-row')
            let bodyData = [];
            var recs=[];
            if(cartRows.length!=0){
            var i=0;
            for (i = 0; i <cartRows.length; i++) {
            var cartRow=cartRows[i]
            var title = cartRow.getElementsByClassName('cart-item-title')[0].innerText
            var price = cartRow.getElementsByClassName('cart-price')[0].innerText
            var quantity = cartRow.getElementsByClassName('cart-quantity-input')[0].value
            var rowData = [];
            var srno=i+1;
            var total='$'+price*quantity;
            var totals=price*quantity;
            var prices=price;
            //alert("<?php orderno(); ?>");
            var orderno=Number(document.getElementById('orderno').innerHTML);
            orderno=orderno+1;
            console.log(orderno);
            //var email= JSON.parse(document.getElementById('email').innerHTML);
            //console.log(email.name);

            console.log(email1);
            var a={};
            a.title=title;
            a.price=prices;
            a.quantity=quantity;
            a.total=totals;
            a.email1=email1;
            a.orderno=orderno;
            a.username1=username1;
            a.phoneno1=phoneno1;
            a.address1=address1;
            recs.push(a);
            rowData.push(srno,title,price,quantity,total);
            console.log(rowData)
            bodyData.push(rowData);
}

var total=document.getElementsByClassName('cart-total-price')[0].innerText
var totalamt=[]
totalamt=[{content: "", colSpan: 3,
styles: { fillColor: [255, 255, 255] }
},{content: "Total:" +total, colSpan: 2,
styles: { fillColor: [223, 200, 46] }
}]
bodyData.push(totalamt)


console.log(recs);
$.ajax({
  url:"second.php",
  method:"post",
  data: {recs: JSON.stringify(recs)},
  success: function(res){
    console.log(res);
  }
})

          doc.autoTable({
          styles : { halign : 'center'}, headStyles :{fillColor : [31, 32, 34]}, alternateRowStyles: {fillColor : [218, 218, 218]}, tableLineColor: [31, 32, 34],margin: { top:49 },
            head:[['Sr no.','Item-Description','Price','Qty','Total']],
            body:bodyData,
          })
          console.log(bodyData)
          bodyData=[];
          recs=[];
        }
        else {
          doc.text("Nothing to show");
        }
        doc.setFontSize(20)
        doc.text(85,15,"Tasty Bites");
        doc.setFontSize(10)
        doc.text(15,25,"Billed to: "+username1);
        doc.text(15,29,"Address: "+address1);
        doc.text(15,33,"Phone no: "+phoneno1);
        doc.text(15,37,"Email: "+email1);
        var date = new Date();
        doc.text(15,41,"Date-Time: "+date);
        doc.text(15,45,"Order No.: "+orderno);
        doc.save('invoice.pdf')
          }
