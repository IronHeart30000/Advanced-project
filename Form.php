<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="shortcut icon" href="https://cdn.salla.sa/BRWxB/YVMBy9lP0o9KDUO1a3EB1eroktFymu52AQYBC8ZD.jpg" type="image/x-icon">
    <link rel="stylesheet" href="./style/Form.css">
    <link rel="stylesheet" href="./style/buy.css">
</head>
<body>
    <header>
        <nav>
            <a class="logo" href="./index.php">
                <img style="border-radius: 50%;" src="https://cdn.salla.sa/BRWxB/YVMBy9lP0o9KDUO1a3EB1eroktFymu52AQYBC8ZD.jpg" alt="logo">
            </a>
        </nav>
    </header>
    <section style="width: 100%; max-height: 30vh; background-color: #3636368e; font-size: 2.2rem; text-align: center; padding: 50px; color: white;">
        <div>Order Confiramtion </div>
      </section>
    
    
        <div class="container">
            <div class="bar">
            </div>
        
            <div class="form-container">
                <form >
        
                    <div class="form-page">
                        <label>Shipping Address</label> 
                        <input type="text" id="address" required> <hr>
                        <br>

                        <label> Payment Methods</label><hr>
                        <div style="display: flex; justify-content: space-between;"> 
                            <label for="pay-meth">Online</label>
                            <input type="radio" required  id="pay-meth" value="online" name="awd"> 					
                            <hr>    
                
                            <label for="pay-meth_2"> Cash </label>
                            <input type="radio" required  id="pay-meth_2" value="cash" name="awd">
                
                      </div> <hr>
                      <br>
                      <label> Whatsapp </label>
                      <input type="tel" required id="Whatsapp">      <hr> 
                      <button class="btn" id="submit-btn" onclick="saveOrder()"> Complete </button>    

                    </div>
                    
                    <div class="form-page">
                        <p class="final-message">Your order has been deliver we will contact with your Whatsapp as soon as possible ! thank you :) </p>				
                        <button class="btn" id="button-home" onclick="location.replace('http://localhost')"> Home </button>    

                    </div>
        
                </form>
            </div>
        
        </div>
      
        <script src="Frontend/JS/jquery.min.js"></script>
        <script>
            let listCart = [];

function checkCart() {
    var cookieValue = document.cookie
    .split('; ')
    .find(row => row.startsWith('listCart='));
    if(cookieValue){
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }
}


          function saveOrder() {
            var cart = ""
            var cookieValue = document.cookie
    .split('; ')
    .find(row => row.startsWith('listCart='));
    if(cookieValue){
        cart = JSON.parse(cookieValue.split('=')[1]) ;
    }
    cart.shift();

          //  console.log(cookieValue.split('=')[1])
          
              var dataToSend = {
                'address' : $('#address').val() ,
                'payment_online' : $('#pay-meth').is(":checked") ,
                'payment_cash' : $('#pay-meth_2').is(":checked") ,
                'phone' : $('#Whatsapp').val(),
                "cart" : JSON.stringify(cart)
              }
              $.ajax({
                  type: "POST",
                  url: "orders-control.php",
                  data: dataToSend, 
                  success: function(res) {
                    console.log(res)
                  }
              });
          }
  

          </script>
    
        <script>
            const buttons = document.querySelectorAll('.btn')
    const formPages = document.querySelectorAll('.form-page')
    const bars = document.querySelectorAll('.bar-circle')   
    
    let pageStates = {
        oldPageNum: null,
        currentPage: null,
    }
    
    const pageTransform = () => {
        formPages.forEach(page => {        
            page.style.transform = `translateX(-${(pageStates.currentPage) * 100}%)`
        })
    }
    
    const handleClasses = () => {     
    
        bars.forEach(bar => {
            bar.classList.remove('active')
        })
    
        if(bars[pageStates.currentPage]) {
            for(let i = 0; i < pageStates.currentPage + 1; i++) {
                bars[i].classList.add('active')
            }
        } else {
            bars.forEach(bar => {
                bar.classList.add('active')
                bar.classList.add('done')
            })
        }
    }
    
    const indexFinder = (el) => {    
        let i = 0;
        for(; el = el.previousElementSibling; i++);
        return i;
    }
    
    const pageHandler = (e) => {
        e.preventDefault()
    
        const navData = e.currentTarget.getAttribute('data-nav')
        pageStates.oldPageNum = indexFinder(e.currentTarget.parentElement)
        
        if(navData == "prev") {
            pageStates.currentPage = pageStates.oldPageNum - 1
        } else {
            pageStates.currentPage = pageStates.oldPageNum + 1
        }    
    
        pageTransform()
        handleClasses()
    }
    
    
    const barHandler = (e) => {
        e.preventDefault()
        pageStates.currentPage = indexFinder(e.currentTarget)
    
        pageTransform()
        handleClasses()
    }
    
    buttons.forEach(button => {
        button.addEventListener('click', pageHandler)
    })
    
    bars.forEach(bar => {
        bar.addEventListener('click', barHandler)
    })
        </script>
    
</body>
</html>