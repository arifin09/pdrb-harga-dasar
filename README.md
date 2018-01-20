# PDRB atas Harga Dasar Berlaku
Product domestic regional bruto (PDRB) atas dasar harga berlaku

Cara install :

```bash
$ composer require bantenprov/pdrb-harga-dasar:dev-master
```

Tambahkan route di dalam : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
    redirect: '/dashboard/home',
    component: resolve => require(['./DashboardLayout.vue'], resolve),
    children: [
    .....
    
    {
    path: '/dashboard/pdrb-harga-dasar',
        component: resolve => require(['./components/bantenprov/pdrb-harga-dasar/Index.vue'], resolve),
        meta: {
            title: "PDRB Harga Dasar"
        }
    }
```

```javascript
{
    path: '/admin',
    redirect: '/admin/home',
    component: resolve => require(['./AdminLayout.vue'], resolve),
    children: [
      {
        path: '/admin/home',
        component: resolve => require(['./components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarAdmin.view.vue'], resolve),
        meta: {
          title: "PDRB Harga Dasar"
        }
      },
      {
        path: '/admin/pdrb-harga-dasar',
        component: resolve => require(['./components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarAdmin.view.vue'], resolve),
        meta: {
          title: "PDRB Harga Dasar"
        }
      }
    ]
  },

```

Tambahkan components `resources/assets/js/components.js` :

```javascript
import PdrbHargaDasar from './components/bantenprov/pdrb-harga-dasar/PdrbHargaDasar.chart.vue';
Vue.component('echarts-pdrb-harga-dasar', PdrbHargaDasar);

import PdrbHargaDasarKota from './components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarKota.chart.vue';
Vue.component('echarts-pdrb-harga-dasar-kota', PdrbHargaDasarKota);

import PdrbHargaDasarTahun from './components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarTahun.chart.vue';
Vue.component('echarts-pdrb-harga-dasar-tahun', PdrbHargaDasarTahun);
```

Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=pdrb-assets
```

