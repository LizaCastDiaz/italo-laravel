import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);

window.Alpine = Alpine;

Alpine.start();
