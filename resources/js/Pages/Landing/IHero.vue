<template>
    <section
        id="hero"
        class="min-h-screen justify-center bg-[url('/images/impotractor/main-bgx2.jpg')] bg-cover bg-center"
    >
        <div class="hero-container">
            <div class="container">
                <h2>¡MÁS QUE REPUESTOS, TODO UN SERVICIO!</h2>
                <p>ENCUENTRA LO QUE BUSCAS CON NOSOTROS</p>

                <a href="/#Contact" class="btn-get-started scrollto"
                    >¡COTIZA YA!</a
                >
            </div>
        </div>
    </section>
</template>
<style>
#hero .hero-container {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    top: 70px;
    left: 50px;
    right: 50px;
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
        font-size: 20px;
        line-height: 1.2;
    }
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
    color: black;
}

.btn-outline-primary {
    text-decoration: none;
    color: #fff;
}
</style>
