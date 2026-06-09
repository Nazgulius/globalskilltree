import './bootstrap';
import './petals.js'; // падающие лепестки
// import './createBuild.js'; // создание билда
// import './components/push-notifications.js'; // уведомление
import { addNotification } from './components/push-notifications';

window.addNotification = addNotification;



