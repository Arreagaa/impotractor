import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import LaravelPermissionToVueJS from "laravel-permission-to-vuejs";

/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import { faFacebook } from "@fortawesome/free-brands-svg-icons";
import {
    faBars,
    faCircleCheck,
    faTractor,
    faBriefcase,
    faScrewdriver,
    faXmark,
    faArrowRightLong,
    faCartShopping,
    faChartPie,
    faUser,
    faInbox,
    faBagShopping,
    faClipboardList,
    faClipboardCheck,
    faTruckFast,
    faRightFromBracket,
    faTruckRampBox,
    faFileCircleQuestion,
    faTrashCanArrowUp,
    faPenToSquare,
    faArrowUpFromBracket,
    faFileLines,
    faMagnifyingGlass,
    faScrewdriverWrench,
    faBusinessTime
} from "@fortawesome/free-solid-svg-icons";

/* add icons to the library */
library.add(
    faFacebook,
    faBars,
    faCircleCheck,
    faTractor,
    faBriefcase,
    faScrewdriver,
    faXmark,
    faArrowRightLong,
    faCartShopping,
    faChartPie,
    faUser,
    faInbox,
    faBagShopping,
    faClipboardList,
    faClipboardCheck,
    faTruckFast,
    faRightFromBracket,
    faTruckRampBox,
    faFileCircleQuestion,
    faTrashCanArrowUp,
    faPenToSquare,
    faArrowUpFromBracket,
    faFileLines,
    faMagnifyingGlass,
    faScrewdriverWrench,
    faBusinessTime
);

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .component("l-icon", FontAwesomeIcon)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(LaravelPermissionToVueJS)
            .mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });
