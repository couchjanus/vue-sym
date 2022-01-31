// assets/js/config/axios.js

import axios from 'axios';

// создать экземпляр axios с общей конфигурацией по умолчанию
const instance = axios.create({
    // Установка дефолтных настроек
    
    baseURL: "http://localhost:8001/api",
    // baseURL будет автоматически добавлен перед url, если url не является абсолютным URL.

    // headers - это настраиваемый заголовок запроса для отправки
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json'
    }
});
// Alter defaults after instance has been created
// instance.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

export default instance;
