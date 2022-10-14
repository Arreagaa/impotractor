<template>
    <!-- ======= hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div
                id="heroCarousel"
                class="carousel slide carousel-fade"
                data-bs-ride="carousel"
                data-bs-interval="5000"
            >
                <ol
                    id="hero-carousel-indicators"
                    class="carousel-indicators"
                ></ol>

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="carousel-container">
                            <div class="container">
                                <h2
                                    class="animate__animated animate__fadeInDown"
                                >
                                    ¡MÁS QUE REPUESTOS, TODO UN SERVICIO!
                                </h2>
                                <p class="animate__animated animate__fadeInUp">
                                    ENCUENTRA LO QUE BUSCAS CON NOSOTROS
                                </p>

                                <a
                                    class="btn-get-started scrollto animate__animated animate__fadeInUp"
                                    >¡EMPIEZA YA!</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->
</template>

<style>
/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
    width: 100%;
    height: 100vh;
    background: #000;
    overflow: hidden;
    position: relative;
}
@media (max-height: 500px) {
    #hero {
        height: 150vh;
    }
}
#hero .carousel,
#hero .carousel-inner,
#hero .carousel-item,
#hero .carousel-item::before {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
}
#hero .carousel-item {
    background-image: url("/images/impotractor/main-bgx2.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
#hero .carousel-item::before {
    content: "";
    background-color: rgba(0, 0, 0, 0.7);
}
#hero .carousel-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    top: 70px;
    left: 50px;
    right: 50px;
}
#hero .container {
    text-align: center;
}
#hero h2 {
    color: #fff;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: 700;
}
@media (max-width: 768px) {
    #hero h2 {
        font-size: 20px;
        line-height: 1.2;
    }
}
#hero p {
    width: 80%;
    font-size: 38px;
    line-height: 1.2;
    margin: 0 auto 30px auto;
    color: #fff;
}
@media (min-width: 1024px) {
    #hero p {
        width: 60%;
    }
}
@media (max-width: 768px) {
    #hero p {
        font-size: 28px;
        line-height: 1.2;
    }
}
#hero .carousel-fade {
    overflow: hidden;
}
#hero .carousel-fade .carousel-inner .carousel-item {
    transition-property: opacity;
}
#hero .carousel-fade .carousel-inner .carousel-item,
#hero .carousel-fade .carousel-inner .active.carousel-item-start,
#hero .carousel-fade .carousel-inner .active.carousel-item-end {
    opacity: 0;
}
#hero .carousel-fade .carousel-inner .active,
#hero .carousel-fade .carousel-inner .carousel-item-next.carousel-item-start,
#hero .carousel-fade .carousel-inner .carousel-item-prev.carousel-item-end {
    opacity: 1;
    transition: 0.5s;
}
#hero .carousel-fade .carousel-inner .carousel-item-next,
#hero .carousel-fade .carousel-inner .carousel-item-prev,
#hero .carousel-fade .carousel-inner .active.carousel-item-start,
#hero .carousel-fade .carousel-inner .active.carousel-item-end {
    left: 0;
    transform: translate3d(0, 0, 0);
}
#hero .carousel-control-prev,
#hero .carousel-control-next {
    width: 10%;
}
@media (min-width: 1024px) {
    #hero .carousel-control-prev,
    #hero .carousel-control-next {
        width: 5%;
    }
}
#hero .carousel-control-next-icon,
#hero .carousel-control-prev-icon {
    background: none;
    font-size: 32px;
    line-height: 1;
}
#hero .carousel-indicators li {
    cursor: pointer;
}
#hero .btn-get-started {
    font-weight: 500;
    font-size: 16px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 8px 32px;
    border-radius: 50px;
    transition: 0.5s;
    margin: 10px;
    color: #fff;
    background: #f1c40f;
}
#hero .btn-get-started:hover {
    background: #fff;
    color: #283a5ae6;
}

.btn {
    background-color: #283a5ae6;
    border: #283a5ae6;
    box-shadow: #283a5ae6;
    margin-left: 5px;
    margin-right: auto;
    text-decoration: none;
}

.btn:hover {
    background-color: #f1c40f;
    border: #f1c40f;
    box-shadow: #f1c40f;
    margin-left: 5px;
    margin-right: auto;
    text-decoration: none;
}

.btn-outline-primary {
    text-decoration: none;
    color: #fff;
}
</style>
