<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpstudy_pro\WWW\testjq\public/../application/index\view\test\product.html";i:1603875682;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!--<link href="/static/lean/css/css_1.css" rel="stylesheet" />-->
    <!--<link href="/static/lean/css/css_2.css" rel="stylesheet" />-->

</head>


<style>

    @import url("https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.13/tailwind.min.css");
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    :root {
        --cyberpunk-yellow: #f0e801;
        --among-us-red: #c51110;
        --fall-guys-pink: #fa40a3;
    }

    .bg-cyberpunk:hover {
        background: var(--cyberpunk-yellow);
    }
    .bg-among-us:hover {
        background: var(--among-us-red);
    }
    .bg-fall-guys:hover {
        background: var(--fall-guys-pink);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    .card {
        transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
    }

    .name {
        transform: translate3d(0, 0, 50px);
        transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
    }

    .card:hover .name {
        top: 1rem;
        opacity: 1;
    }

    .buy {
        left: 50%;
        transform: translate3d(-50%, 0, 50px);
        transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
    }

    .card:hover .buy {
        bottom: 1rem;
        opacity: 1;
    }

    img {
        transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
    }

    .card:hover img {
        transform: translate3d(0, 0, 50px);
        transform-style: preserve-3d;
    }

    .image::before {
        content: "";
        border-radius: .25rem;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: .25rem;
        opacity: 0;
        transition: all .5s;
    }

    .card:hover .image::before {
        opacity: .2;
    }

    .image-1::before {
        background: url("/static/image/1.png");
    }
    .image-2::before {
        background: center / cover url("https://www.jq22.com/newjs/c2.jpg");
    }
    .image-3::before {
        background :url("/static/image/3.png");
    }
</style>


<body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>

<div class="min-h-screen bg-gray-900 pb-20 grid">
    <h1 class='flex items-end justify-center h-full w-full text-3xl text-white font-thin uppercase'>Hover me</h1>

    <div class='grid place-items-center lg:grid-cols-3 _container gap-y-10'>
        <div class="card rounded-lg px-8 py-20 relative hover:shadow-xl">
            <h2 class="name text-gray-100 text-center text-xl font-medium uppercase transition-all duration-500 opacity-0 z-10 absolute top-0 left-0 w-full">Cyberpunk 2077</h2>
            <a href="#" class="buy buy-cyberpunk absolute bottom-0 bg-gray-600 text-white hover:text-black font-medium px-4 py-2 rounded-full transition-all duration-500 opacity-0 z-10 bg-cyberpunk">Buy Now</a>
            <div class="image image-1">
                <img src="https://www.jq22.com/newjs/c1.jpg" alt="Cyberpunk 2077" class="product rounded transition-all duration-500">
            </div>
        </div>

        <div class="card rounded-lg px-8 py-20 relative hover:shadow-xl">
            <h2 class="name text-gray-100 text-center text-xl font-medium uppercase transition-all duration-500 opacity-0 z-10 absolute top-0 left-0 w-full">Among Us</h2>
            <a href="#" class="buy buy-among-us absolute bottom-0 bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded-full transition-all duration-500 opacity-0 z-10 bg-among-us">Buy Now</a>
            <div class="image image-2">
                <img src="https://www.jq22.com/newjs/c2.jpg" alt="Among Us" class="product rounded transition-all duration-500">
            </div>
        </div>

        <div class="card rounded-lg px-8 py-20 relative hover:shadow-xl">
            <h2 class="name text-gray-100 text-center text-xl font-medium uppercase transition-all duration-500 opacity-0 z-10 absolute top-0 left-0 w-full">Fall Guys</h2>
            <a href="#" class="buy buy-fall-guys absolute bottom-0 bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded-full transition-all duration-500 opacity-0 z-10 bg-fall-guys">Buy Now</a>
            <div class="image image-3">
                <img src="/static/image/3.png" alt="Fall Guys" class="product rounded transition-all duration-500">
            </div>
        </div>
    </div>
</div>


</body>

<script>
    VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 1000,
        transition: true,
    })
</script>

</html>