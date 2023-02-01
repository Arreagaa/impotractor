<template>
    <section id="about" class="about">
        <div class="max-w-app relative w-full">
            <div>
                <div class="lg:flex flex-wrap justify-center">
                    <div class="lg:w-1/2 w-full pb-16">
                        <div class="row position-relative">
                            <div class="col-lg-7">
                                <div class="our-story bg-white">
                                    <h4>Ciudad de Guatemala</h4>
                                    <h3>Nuestra Historia</h3>
                                    <p class="text-lg">
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
                                    <ul class="lg:block hidden">
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Centrados en nuestros
                                                Clientes, siempre dispuestos
                                                para apoyar.</span
                                            >
                                        </li>
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Con el Conocimiento y
                                                Experiencia necesaria para este
                                                Trabajo.</span
                                            >
                                        </li>
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Inicia ya, para poder
                                                hacerte de nuestros Servicios de
                                                Calidad.</span
                                            >
                                        </li>
                                    </ul>
                                    <ul class="lg:hidden">
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Centrados en nuestros
                                                Clientes.</span
                                            >
                                        </li>
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Conocimientos y
                                                Experiencia.</span
                                            >
                                        </li>
                                        <li>
                                            <l-icon
                                                icon="fa-solid fa-circle-check"
                                                class="text-yellow-400 text-2xl"
                                            />
                                            <span
                                                >&nbsp;Servicios y Productos de
                                                Calidad.</span
                                            >
                                        </li>
                                    </ul>
                                    <br />
                                    <p class="text-lg">
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
                            class="lg:block hidden relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg mt-8"
                        >
                            <img
                                src="images/impotractor/about-us.jpg"
                                class="w-full align-middle rounded-t-lg shadow-lg"
                            />
                            <blockquote class="box relative p-5 mb-0 bg-white">
                                <svg
                                    preserveAspectRatio="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block h-95-px -top-94-px"
                                ></svg>
                                <h4 class="text-2xl font-bold text-black">
                                    De esto estamos hechos
                                </h4>
                                <p class="text-lg mt-2 text-black">
                                    Tenemos servicio de importación de repuestos
                                    para entrega de 2 a 8 días y brindamos
                                    asesoría necesaria en la compra de
                                    repuestos, sin ningún compromiso, ofreciendo
                                    calidad y garantía en los mismos.
                                </p>
                            </blockquote>
                        </div>

                        <div
                            class="lg:hidden relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg"
                        >
                            <img
                                alt=""
                                src="https://0201.nccdn.net/4_2/000/000/017/e75/F4-727x483.jpg#RDAMDAID25688643"
                                class="w-full align-middle rounded-t-lg shadow-lg"
                            />
                            <blockquote class="box relative p-5 mb-0 bg-white">
                                <svg
                                    preserveAspectRatio="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block h-95-px -top-94-px"
                                ></svg>
                                <h4 class="text-2xl font-bold text-black">
                                    De esto estamos hechos
                                </h4>
                                <p class="text-lg mt-2 text-black">
                                    Tenemos servicio de importación de repuestos
                                    para entrega de 2 a 8 días y brindamos
                                    asesoría necesaria en la compra de
                                    repuestos, sin ningún compromiso, ofreciendo
                                    calidad y garantía en los mismos.
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

.about span {
    font-size: 16px;
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
