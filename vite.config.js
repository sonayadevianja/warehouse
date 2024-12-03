import react from '@vitejs/plugin-react';
import laravel from 'laravel-vite-plugin';

export default {
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
    react(),  // Adding the React plugin
  ],
  server: {
    host: '0.0.0.0',  // Server accessible from all devices on the network
    port: 3000,       // Port configuration for the server
  },
};
