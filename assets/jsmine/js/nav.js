const createNav = () => {
    let nav = document.querySelector('.navbar');

    nav.innerHTML = `
 <div class="nav">
    <img src="../assets/images/tpclogo.jpg" class="brand-logo" alt="">
    <div class="nav-items">
        <div class="search">
            <input type="text" class="search-box" placeholder="search brand, product">
            <button class="search-btn">search</button>
        </div>
        <a href="#"><img src="../assets/images/cart.png" alt=""></a>
        <a href="#"><img src="../assets/images/user.png" alt=""></a>
     </div>
 </div>
    <ul class="links-container">
    <li class="link-item"><a href="#" class="link">Home</a></li>
    <li class="link-item"><a href="#" class="link">Brand New</a></li>
    <li class="link-item"><a href="#" class="link">Surplus</a></li>
    </ul>
    `;
}

createNav();