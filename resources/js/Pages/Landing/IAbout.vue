<template>
    <section id="about" class="about">
        <div class="max-w-app relative w-full">
            <div>
                <div class="lg:flex flex-wrap justify-center">
                    <div class="lg:w-1/2 w-full pb-16">
                        <div class="row position-relative">
                            <div class="col-lg-7">
                                <div class="our-story bg-white">
                                    <h4>Est 2005</h4>
                                    <h3>Our Story</h3>
                                    <p>
                                        En agosto del año 2005, Impotractor S.A.
                                        abre sus puertas como una empresa de
                                        importación, venta de herramienta de
                                        corte y repuestos aftermarket de marcas
                                        reconocidas, calidad mundial y los
                                        mejores precios del mercado y
                                        específicamente para maquinaria pesada
                                        de construcción.
                                    </p>
                                    <br />
                                    <ul>
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Centrados en nuestros
                                                clientes, siempre dispuestos
                                                para apoyar.</span
                                            >
                                        </li>
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Con el conocimiento y
                                                experiencia necesaria para este
                                                trabajo.</span
                                            >
                                        </li>
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Inicia ya, para poder
                                                hacerte de nuestros servicios de
                                                calidad.</span
                                            >
                                        </li>
                                    </ul>
                                    <br />
                                    <p>
                                        En nuestro trabajo nos enpeñamos en
                                        hacer las cosas con la mejor
                                        disponibilidad, responsabilidad,
                                        eficiencia y honestidad ofreciendo de
                                        esta manera un valor agregado a nuestro
                                        servicio, con toda la atención que
                                        nuestros clientes se merecen.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 w-full lg:pl-8 pl-0 lg:pt-0 pt-8">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg"
                        >
                            <img
                                alt="..."
                                src="/images/impotractor/about.jpg"
                                class="w-full align-middle rounded-t-lg"
                            />
                            <blockquote class="box relative p-5 mb-0 bg-white">
                                <svg
                                    preserveAspectRatio="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block h-95-px -top-94-px"
                                ></svg>
                                <h4 class="text-xl font-bold text-black">
                                    Great for your awesome project
                                </h4>
                                <p class="text-md font-light mt-2 text-black">
                                    Putting together a page has never been
                                    easier than matching together pre-made
                                    components. From landing pages presentation
                                    to login areas, you can easily customise and
                                    built your pages.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<style>
.about {
    text-align: justify;
}
.about .our-story {
    padding: 40px;
}
@media (min-width: 991px) {
    .about .our-story {
        padding-right: 15%;
    }
}

.about .our-story h4 {
    text-transform: uppercase;
    font-size: 18px;
    color: #838893;
}

.about .our-story h3 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 20px;
    color: var(--color-secondary);
}

.about .our-story p:last-child {
    margin-bottom: 0;
}

.about p {
    font-size: 18px;
}

.about ul {
    list-style: none;
    padding: 0;
    font-size: 15px;
}

.about ul li {
    padding: 5px 0;
    display: flex;
    align-items: center;
}

.about ul i {
    font-size: 20px;
    margin-right: 4px;
    color: var(--color-primary);
}
</style>
