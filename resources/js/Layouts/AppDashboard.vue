<template>
    <aside
        id="sidebar"
        class="bg-zinc-900 fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
        aria-label="Sidebar"
    >
        <div
            class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0"
        >
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 px-3 bg-white divide-y space-y-1">
                    <ul class="space-y-2 pb-2">
                        <li>
                            <a
                                href="/dashboard"
                                class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group"
                            >
                                <svg
                                    class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                    ></path>
                                    <path
                                        d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                    ></path>
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="/user/profile"
                                class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                            >
                                <svg
                                    class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="ml-3 flex-1 whitespace-nowrap"
                                    >Cuenta</span
                                >
                                <span
                                    class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full"
                                    >Personal</span
                                >
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"
                                target="_blank"
                                class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                            >
                                <svg
                                    class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                                    ></path>
                                    <path
                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
                                    ></path>
                                </svg>
                                <span class="ml-3 flex-1 whitespace-nowrap"
                                    >Inbox</span
                                >
                                <span
                                    class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full"
                                    >Personal</span
                                >
                            </a>
                        </li>
                        <li>
                            <a
                                href="/#Products"
                                target="_blank"
                                class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                            >
                                <svg
                                    class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                                <span class="ml-3 flex-1 whitespace-nowrap"
                                    >Productos</span
                                >
                            </a>
                        </li>
                    </ul>
                    <div class="space-y-2 pt-2">
                        <a
                            href="/cotization"
                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                        >
                            <svg
                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"
                                ></path>
                                <path
                                    fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span class="ml-3">Cotizaciones</span>
                        </a>
                        <a
                            href="/cotization/#Calculator"
                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                        >
                            <svg
                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6.32 1.827a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V4.757c0-1.47 1.073-2.756 2.57-2.93zM7.5 11.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H8.25a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H8.25zm-.75 3a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H8.25a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75H8.25zm1.748-6a.75.75 0 01.75-.75h.007a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.007a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.007zm-.75 3a.75.75 0 01.75-.75h.007a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.007a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75h-.007zm1.754-6a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.008zm-.75 3a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75h-.008zm1.748-6a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.008zm-8.25-6A.75.75 0 018.25 6h7.5a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75v-.75zm9 9a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-2.25z"
                                    clip-rule="evenodd"
                                />
                            </svg>

                            <span class="ml-3">Calculadora</span>
                        </a>
                        <a
                            href="/cotization/#Resumen"
                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                        >
                            <svg
                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                                ></path>
                            </svg>
                            <span class="ml-3">Resumen</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</template>
