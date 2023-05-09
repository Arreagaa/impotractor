<template>
    <a
        href="/"
        class="w-full h-screen flex flex-col items-center justify-center"
    >
        <div class="spinner"></div>

        <div class="flex flex-col items-center justify-center">
            <p
                class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-wider text-gray-600 mt-8"
            >
                404
            </p>
            <p
                class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-600 mt-2"
            >
                Server Error
            </p>
            <p class="md:text-lg xl:text-2xl text-gray-500 mt-4">
                No posees los permisos necesarios para continuar.
            </p>
        </div>
    </a>
</template>
<style>
.spinner {
    width: 90px;
    height: 90px;
    display: grid;
    color: #f1c40f;
    background: radial-gradient(
        farthest-side,
        currentColor calc(100% - 7px),
        #0000 calc(100% - 6px) 0
    );
    -webkit-mask: radial-gradient(
        farthest-side,
        #0000 calc(100% - 15px),
        #000 calc(100% - 13px)
    );
    border-radius: 50%;
    animation: spinner-sm4bhi 2s infinite linear;
}

.spinner::before,
.spinner::after {
    content: "";
    grid-area: 1/1;
    background: linear-gradient(currentColor 0 0) center,
        linear-gradient(currentColor 0 0) center;
    background-size: 100% 11px, 11px 100%;
    background-repeat: no-repeat;
}

.spinner::after {
    transform: rotate(45deg);
}

@keyframes spinner-sm4bhi {
    100% {
        transform: rotate(1turn);
    }
}
</style>
