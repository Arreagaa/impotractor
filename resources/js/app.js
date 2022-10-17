import './bootstrap';
import '../css/app.css';
import jQuery from 'jquery';
window.$ = jQuery;

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faYoutube, faFacebook, faInstagram, faWhatsapp } from '@fortawesome/free-brands-svg-icons'
import { faEnvelope, faClock } from'@fortawesome/free-regular-svg-icons'
import { faArrowRight, faBars, faCirclePlus, faCircleMinus, faAngleRight, faAngleLeft, faCreditCard, faCalendar, faCircleCheck, faTractor, faBriefcase, faScrewdriver } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(
        faYoutube, faFacebook, faInstagram, faArrowRight, faBars, faCirclePlus, faCircleMinus, faEnvelope, faAngleRight, faAngleLeft, faCreditCard,faClock, faCalendar,
        faCircleCheck, faTractor, faBriefcase, faScrewdriver, faWhatsapp
    )


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .component('l-icon', FontAwesomeIcon)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });


