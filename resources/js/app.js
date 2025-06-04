import './bootstrap';
import 'flowbite';
import Swal from 'sweetalert2';
import { DataTable } from 'simple-datatables';

import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

window.Swal = Swal;
window.DataTable = DataTable;

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
