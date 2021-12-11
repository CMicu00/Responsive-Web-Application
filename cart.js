function addToCart(index){
    var storedCart

    if(localStorage.cart){
        storedCart = JSON.parse(localStorage.cart)
    }else{
        storedCart = new Array()
    }

    storedCart.push(product[index])
    localStorage.cart = JSON.stringify(storedCart)

}