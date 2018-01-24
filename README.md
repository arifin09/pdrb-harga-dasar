# PDRB atas Harga Dasar Berlaku

[![Join the chat at https://gitter.im/pdrb-harga-dasar/Lobby](https://badges.gitter.im/pdrb-harga-dasar/Lobby.svg)](https://gitter.im/pdrb-harga-dasar/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Product domestic regional bruto (PDRB) atas dasar harga berlaku

#### Cara install :

```bash
$ composer require bantenprov/pdrb-harga-dasar:dev-master
```

#### Edit `config/app.php` :
```php

'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        //....
        Bantenprov\PdrbHargaDasar\PdrbHargaDasarServiceProvider::class,

```

#### Tambahkan route di dalam : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
    redirect: '/dashboard/home',
    component: resolve => require(['./DashboardLayout.vue'], resolve),
    children: [
    .....
    
    {
    path: '/dashboard/pdrb-harga-dasar',
        component: resolve => require(['./components/views/bantenprov/pdrb-harga-dasar/DashboardPdrbHargaDasar.vue'], resolve),
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
        component: resolve => require(['./components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarAdmin.show.vue'], resolve),
        meta: {
          title: "PDRB Harga Dasar"
        }
      },
      {
        path: '/admin/pdrb-harga-dasar',
        component: resolve => require(['./components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarAdmin.show.vue'], resolve),
        meta: {
          title: "PDRB Harga Dasar"
        }
      }
    ]
  },

```

#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
      {
        name: 'Dashboard',
        link: '/dashboard',
        icon: 'fa fa-angle-double-right'
      },
      {
        name: 'Entity',
        link: '/dashboard/entity',
        icon: 'fa fa-angle-double-right'
      },
      //...
      {
        name: 'PDRB Harga Dasar',
        link: '/dashboard/pdrb-harga-dasar',
        icon: 'fa fa-angle-double-right'
      }
    ]
  },
```


#### Tambahkan components `resources/assets/js/components.js` :

```javascript
import PdrbHargaDasar from './components/bantenprov/pdrb-harga-dasar/PdrbHargaDasar.chart.vue';
Vue.component('echarts-pdrb-harga-dasar', PdrbHargaDasar);

import PdrbHargaDasarKota from './components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarKota.chart.vue';
Vue.component('echarts-pdrb-harga-dasar-kota', PdrbHargaDasarKota);

import PdrbHargaDasarTahun from './components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarTahun.chart.vue';
Vue.component('echarts-pdrb-harga-dasar-tahun', PdrbHargaDasarTahun);

import PdrbHargaDasarAdminShow from './components/bantenprov/pdrb-harga-dasar/PdrbHargaDasarAdmin.show.vue';
Vue.component('admin-view-pdrb-harga-dasar-tahun', PdrbHargaDasarAdminShow);

//== Echarts pdrb

import PdrbHargaDasarBar01 from './components/views/bantenprov/pdrb-harga-dasar/PdrbHargaDasarBar01.vue';
Vue.component('pdrb-harga-dasar-bar-01', PdrbHargaDasarBar01);

import PdrbHargaDasarPie01 from './components/views/bantenprov/pdrb-harga-dasar/PdrbHargaDasarPie01.vue';
Vue.component('pdrb-harga-dasar-pie-01', PdrbHargaDasarPie01);


```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=pdrb-assets
```


