import axios from 'axios';

const api = axios.create({
    baseURL: 'http://192.168.10.13:3000'
});

// Productos
export const getProducto = async () => {
    const response = await api.get('/producto');
    return response.data;
};

export const createProducto = async (producto) => {
    const response = await api.post('/producto', producto);
    return response.data;
};

export const updateProducto = async (CodigoProducto, producto) => {
    const response = await api.put(`/producto/${CodigoProducto}`, producto);
    return response.data;
};

export const deleteProducto = async (CodigoProducto) => {
    const response = await api.delete(`/producto/${CodigoProducto}`);
    return response.data;
};

export const getProductoByCodigoProducto = async (CodigoProducto) => {
    const response = await api.get(`/producto/${CodigoProducto}`);
    return response.data;
};

// Categorías
export const getCategorias = async () => {
    const response = await api.get('/categoria');
    return response.data;
};

// Estados
export const getEstados = async () => {
    const response = await api.get('/estado');
    return response.data;
};

// Marcas
export const getMarcas = async () => {
    const response = await api.get('/marca'); // corregido de /marcas a /marca
    return response.data;
};

// Tallas
export const getTallas = async () => {
    const response = await api.get('/talla'); // corregido de /tallas a /talla
    return response.data;
};





// Usuarios



export const getUsuario = async () => { 
    const response = await api.get('/usuario'); 
    return response.data; 
    }; 
    
    export const updateUsuario
     = async (Num_Documento, usuario) => {
        const response = await api.put(`/usuario/${Num_Documento}`, usuario);
        return response.data;
    };