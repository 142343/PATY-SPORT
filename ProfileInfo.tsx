import { StackScreenProps } from '@react-navigation/stack';
import React, { useEffect, useState } from 'react';
import { View, Text, FlatList, TextInput, TouchableOpacity, ScrollView, ImageBackground, Image, Alert } from 'react-native';
import { Picker } from '@react-native-picker/picker';
import { RootStackParamList } from '../../../../../App';
import useViewModel from './ViewModal';
import Ionicons from 'react-native-vector-icons/Ionicons';
import MaterialIcons from 'react-native-vector-icons/MaterialIcons';
import { LinearGradient } from 'expo-linear-gradient';

import {
  getProducto,
  createProducto,
  updateProducto,
  deleteProducto,
  getProductoByCodigoProducto,
  getCategorias,
  getEstados,
  getTallas,
  getMarcas
} from '../../../../Data/sources/remote/api/api';
import Modal from 'react-native-modal';
import styles from './Styles';

interface producto {
  CodigoProducto: number;
  Nombre: string;
  Precio: number;
  IVA: number;
  Imagen: string;
  CategoriaCodigoCategoría: string;
  EstadoCodigoEstado: string;
  MarcasCodigoMarca: string;
  TallasCodigoTallas: string;
}

interface Props extends StackScreenProps<RootStackParamList, 'ProfileInfoScreen'> {}

export const ProfileInfoScreen = ({ navigation }: Props) => {
  const [producto, setProducto] = useState<producto[]>([]);
  const [Nombre, setNombre] = useState('');
  const [Precio, setPrecio] = useState('');
  const [IVA, setIVA] = useState('');
  const [Imagen, setImagen] = useState('');
  const [CategoriaCodigoCategoría, setCategoriaCodigoCategoría] = useState('');
  const [EstadoCodigoEstado, setEstadoCodigoEstado] = useState('');
  const [MarcasCodigoMarca, setMarcasCodigoMarca] = useState('');
  const [TallasCodigoTallas, setTallasCodigoTallas] = useState('');
  const [categoria, setCategorias] = useState<any[]>([]);
  const [estado, setEstados] = useState<any[]>([]);
  const [marcas, setMarcas] = useState<any[]>([]);
  const [tallas, setTallas] = useState<any[]>([]);
  const [selectedProductoCodigoProducto, setSelectedProductoCodigoProducto] = useState<number | null>(null);
  const [isReportModalVisible, setReportModalVisible] = useState(false);
  const [isAddProductModalVisible, setAddProductModalVisible] = useState(false);
  const [searchCodigoProducto, setSearchCodigoProducto] = useState('');
  const [searchedProducto, setSearchedProducto] = useState<producto | null>(null);

  useEffect(() => {
    fetchProducto();
    fetchDropdownData();
  }, []);

  const fetchProducto = async () => {
    const data = await getProducto();
    setProducto(data);
  };

  const getPastelColor = () => {
    const hue = Math.floor(Math.random() * 360);
    return `hsla(${hue}, 70%, 85%, 0.7)`;
  };

  const fetchDropdownData = async () => {
    setCategorias(await getCategorias());
    setEstados(await getEstados());
    setMarcas(await getMarcas());
    setTallas(await getTallas());
  };

  const handleAddProduct = async () => {
    try {
      const newProducto = await createProducto({
        Nombre,
        Precio,
        IVA,
        Imagen,
        CategoriaCodigoCategoría,
        EstadoCodigoEstado,
        MarcasCodigoMarca,
        TallasCodigoTallas,
      });

      setProducto([...producto, newProducto]);
      limpiarCampos();
      toggleAddProductModal();

      Alert.alert(
        '¡Éxito!',
        '🎉 El producto fue creado exitosamente.',
        [{ text: '¡Genial!', style: 'default' }]
      );
    } catch (error) {
      Alert.alert(
        'Error',
        'Ocurrió un error al crear el producto.',
        [{ text: 'OK', style: 'destructive' }]
      );
    }
  };

  const handleUpdateProducto = async () => {
    if (selectedProductoCodigoProducto !== null) {
      try {
        const updatedProducto = await updateProducto(selectedProductoCodigoProducto, {
          Nombre,
          Precio,
          IVA,
          Imagen,
          CategoriaCodigoCategoría,
          EstadoCodigoEstado,
          MarcasCodigoMarca,
          TallasCodigoTallas,
        });

        setProducto(producto.map(p => 
          p.CodigoProducto === selectedProductoCodigoProducto ? updatedProducto : p
        ));

        setSelectedProductoCodigoProducto(null);
        limpiarCampos();
        toggleAddProductModal();

        // Alerta "cute"
        Alert.alert(
          '¡Actualización exitosa!',
          '✨ El producto se actualizó correctamente.',
          [{ text: '¡Perfecto!', style: 'default' }]
        );
      } catch (error) {
        Alert.alert(
          'Error',
          'Ocurrió un error al actualizar el producto.',
          [{ text: 'OK', style: 'destructive' }]
        );
      }
    }
  };

  const handleDeleteProducto = async (CodigoProducto: number) => {
    await deleteProducto(CodigoProducto);
    setProducto(producto.filter(p => p.CodigoProducto !== CodigoProducto));
  };

  const handleSearchProducto = async () => {
    if (searchCodigoProducto.trim() === '') {
      setSearchedProducto(null);
      return;
    }
    try {
      const producto = await getProductoByCodigoProducto(parseInt(searchCodigoProducto));
      setSearchedProducto(producto);
    } catch (error) {
      console.error('Error al buscar producto:', error);
      setSearchedProducto(null);
    }
  };

  const toggleReportModal = () => {
    setReportModalVisible(!isReportModalVisible);
  };

  const toggleAddProductModal = () => {
    setAddProductModalVisible(!isAddProductModalVisible);
  };

  const openEditModal = (item: producto) => {
    setNombre(item.Nombre);
    setPrecio(item.Precio.toString());
    setIVA(item.IVA.toString());
    setImagen(item.Imagen);
    setCategoriaCodigoCategoría(item.CategoriaCodigoCategoría);
    setEstadoCodigoEstado(item.EstadoCodigoEstado);
    setMarcasCodigoMarca(item.MarcasCodigoMarca);
    setTallasCodigoTallas(item.TallasCodigoTallas);
    setSelectedProductoCodigoProducto(item.CodigoProducto);
    toggleAddProductModal();
  };

  const limpiarCampos = () => {
    setNombre('');
    setPrecio('');
    setIVA('');
    setImagen('');
    setCategoriaCodigoCategoría('');
    setEstadoCodigoEstado('');
    setMarcasCodigoMarca('');
    setTallasCodigoTallas('');
  };

  const openAddModal = () => {
    limpiarCampos();
    setSelectedProductoCodigoProducto(null);
    toggleAddProductModal();
  };

  const { removeSeccion } = useViewModel();


  // Función para renderizar un ítem de producto con mejores visuales
  const renderProductItem = ({ item }: { item: producto }) => (
    <View style={styles.productContainer}>
      <Text style={[styles.productText, { fontWeight: 'bold', fontSize: 18, color: '#4361ee', marginBottom: 8 }]}>
        {item.Nombre}
      </Text>
      <View style={{ flexDirection: 'row', flexWrap: 'wrap', marginBottom: 10 }}>
        <Text style={[styles.productText, { marginRight: 10, backgroundColor: '#f1f4ff', padding: 5, borderRadius: 5 }]}>
          Precio: ${item.Precio}
        </Text>
        <Text style={[styles.productText, { marginRight: 10, backgroundColor: '#f1f4ff', padding: 5, borderRadius: 5 }]}>
          IVA: {item.IVA}%
        </Text>
      </View>
      <Text style={styles.productText}>Imagen: {item.Imagen}</Text>
      <View style={styles.buttonContainer}>
        <TouchableOpacity style={styles.button} onPress={() => openEditModal(item)}>
          <MaterialIcons name="edit" size={16} color="white" style={{ marginRight: 5 }} />
          <Text style={styles.buttonText}>Modificar</Text>
        </TouchableOpacity>

      </View>
    </View>
  );

  return (
    <View style={{ flex: 1 }}>
      {/* Fondo con patrón */}


      
      <View style={styles.container}>
      <Text style={styles.title}>Gestión de Productos <Ionicons
  name="shirt-outline"
  size={28}
  color="#4361ee"
  style={{
    marginRight: 8,
    textShadowColor: 'rgba(67, 97, 238, 0.7)', // azul eléctrico con transparencia
    textShadowOffset: { width: 0, height: 3 },
    textShadowRadius: 6,
  }}
/>
</Text>

        <TouchableOpacity style={styles.addNewButton} onPress={openAddModal}>
          <MaterialIcons name="add-circle-outline" size={20} color="white" style={{ marginRight: 5 }} />
          <Text style={styles.addNewButtonText}>Agregar Nuevo Producto</Text>
        </TouchableOpacity>

        <FlatList
          data={producto}
          keyExtractor={(item) => item.CodigoProducto.toString()}
          renderItem={renderProductItem}
          showsVerticalScrollIndicator={false}
        />

        <View style={{ marginTop: 10 }}>
          <View style={{ flexDirection: 'row', alignItems: 'center' }}>
            <TextInput
              style={[styles.input, { flex: 1, marginRight: 10 }]}
              placeholder="Buscar por ID de producto"
              value={searchCodigoProducto}
              onChangeText={setSearchCodigoProducto}
              keyboardType="numeric"
            />
            <TouchableOpacity 
              style={[styles.button, { backgroundColor: '#f7b801', marginHorizontal: 0 }]} 
              onPress={handleSearchProducto}
            >
              <MaterialIcons name="search" size={20} color="white" />
            </TouchableOpacity>
          </View>
        </View>

        {searchedProducto && (
          <View style={[styles.productContainer, { borderLeftColor: '#f7b801', marginTop: 15 }]}>
            <Text style={[styles.productText, { fontWeight: 'bold', fontSize: 16, color: '#f7b801' }]}>
              Producto Encontrado:
            </Text>
            <Text style={[styles.productText, { fontWeight: 'bold' }]}>{searchedProducto.Nombre}</Text>
            <Text style={styles.productText}>Precio: ${searchedProducto.Precio}</Text>
            <Text style={styles.productText}>IVA: {searchedProducto.IVA}%</Text>
          </View>
        )}

        <TouchableOpacity style={styles.reportButton} onPress={toggleReportModal}>
          <MaterialIcons name="assessment" size={20} color="white" style={{ marginRight: 5 }} />
          <Text style={styles.reportButtonText}>Generar Reporte</Text>
        </TouchableOpacity>
        
        <TouchableOpacity onPress={() => navigation.goBack()} style={styles.backButton}>
          <Ionicons name="arrow-back" size={30} color="#4361ee" />
        </TouchableOpacity>

        {/* Report Modal */}
        <Modal 
          isVisible={isReportModalVisible} 
          style={styles.modalContainer}
          onBackdropPress={toggleReportModal}
          onBackButtonPress={toggleReportModal}
          animationIn="fadeIn"
          animationOut="fadeOut"
          backdropOpacity={0.5}
        >
          <View style={styles.modalContent1}>
            <TouchableOpacity onPress={toggleReportModal} style={styles.closeButton1}>
              <Ionicons name="close-circle" size={30} color="#4361ee" />
            </TouchableOpacity>
            <Text style={styles.modalTitle}>Reporte de Productos</Text>
            <ScrollView style={styles.scrollView}>
              {producto.map(p => (
                <Text
                  key={p.CodigoProducto}
                  style={[styles.modalText, { backgroundColor: getPastelColor() }]}>
                  <Text style={{ fontWeight: 'bold' }}>{p.Nombre}</Text> - ${p.Precio}
                </Text>
              ))}
            </ScrollView>
          </View>
        </Modal>

        {/* Add/Edit Product Modal */}
        <Modal 
          isVisible={isAddProductModalVisible} 
          backdropOpacity={0.7}
          onBackdropPress={toggleAddProductModal}
          onBackButtonPress={toggleAddProductModal}
          animationIn="slideInUp"
          animationOut="slideOutDown"
        >
          <View style={styles.productModalContent}>
            <Text style={styles.modalTitle1}>
              {selectedProductoCodigoProducto ? "Modificar Producto" : "Nuevo Producto"}
            </Text>
           
            <ScrollView style={styles.modalScrollView}>
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Nombre:</Text>
                <TextInput
                  style={styles.modalInput}
                  placeholder="Nombre del producto"
                  value={Nombre}
                  onChangeText={setNombre}
                />
              </View>
             
              <View style={styles.rowInputs}>
                <View style={styles.halfInput}>
                  <Text style={styles.inputLabel}>Precio:</Text>
                  <TextInput
                    style={styles.modalInput}
                    placeholder="Precio"
                    value={Precio}
                    onChangeText={setPrecio}
                    keyboardType="numeric"
                  />
                </View>
               
                <View style={styles.halfInput}>
                  <Text style={styles.inputLabel}>IVA %:</Text>
                  <TextInput
                    style={styles.modalInput}
                    placeholder="IVA"
                    value={IVA}
                    onChangeText={setIVA}
                    keyboardType="numeric"
                  />
                </View>
              </View>
             
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Imagen URL:</Text>
                <TextInput
                  style={styles.modalInput}
                  placeholder="URL de la imagen"
                  value={Imagen}
                  onChangeText={setImagen}
                />
              </View>

              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Categoría:</Text>
                <View style={styles.pickerContainer}>
                  <Picker
                    selectedValue={CategoriaCodigoCategoría}
                    onValueChange={setCategoriaCodigoCategoría}
                    style={styles.modalPicker}
                  >
                    <Picker.Item label="Seleccione Categoría" value="" color="#4361ee"/>
                    <Picker.Item label="Conjuntos" value="121" />
                    <Picker.Item label="Busos" value="122" />
                    <Picker.Item label="Sudaderas" value="123" />
                    <Picker.Item label="Camisas" value="124" />
                    <Picker.Item label="Chaquetas" value="125" />
                    <Picker.Item label="Pantalonetas" value="126" />
                    <Picker.Item label="Bodys" value="127" />
                    <Picker.Item label="Vestidos" value="128" />
                    <Picker.Item label="Disfraz" value="129" />
                  </Picker>
                </View>
              </View>

              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Estado:</Text>
                <View style={styles.pickerContainer}>
                  <Picker
                    selectedValue={EstadoCodigoEstado}
                    onValueChange={setEstadoCodigoEstado}
                    style={styles.modalPicker}
                  >
                   <Picker.Item label="Seleccione Estado" value=""  color="#4361ee" />
                    <Picker.Item label="ACTIVO" value="101" />
                    <Picker.Item label="INACTIVO" value="102" />
                    <Picker.Item label="AGOTADO" value="103" />
                  </Picker>
                </View>
              </View>
              

              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Marca:</Text>
                <View style={styles.pickerContainer}>
                  <Picker
                    selectedValue={MarcasCodigoMarca}
                    onValueChange={setMarcasCodigoMarca}
                    style={styles.modalPicker}
                  >
                    <Picker.Item label="Seleccione Marca" value="" color="#4361ee" />
                    <Picker.Item label="DK" value="30" />
                    <Picker.Item label="Alma" value="31" />
                    <Picker.Item label="Dogma IND" value="32" />
                    <Picker.Item label="ImperioSg" value="33" />
                    <Picker.Item label="Impermeables Gernimo" value="34" />
                    <Picker.Item label="Paul Salas" value="35" />
                    <Picker.Item label="Robert sp" value="36" />
                    <Picker.Item label="Ezzus" value="37" />
                    <Picker.Item label="Tentacion Sudaderas" value="38" />
                    <Picker.Item label="Mision Fashion" value="39" />
                    <Picker.Item label="Adinkrs Ps" value="40" />
                    <Picker.Item label="Nike" value="41" />
                    <Picker.Item label="Adidas" value="42" />
                  </Picker>
                </View>
              </View>

              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Talla:</Text>
                <View style={styles.pickerContainer}>
                  <Picker
                    selectedValue={TallasCodigoTallas}
                    onValueChange={setTallasCodigoTallas}
                    style={styles.modalPicker}
                  >
                    <Picker.Item label="Seleccione Talla" value="" color="#4361ee" />
                    <Picker.Item label="XS" value="201" />
                    <Picker.Item label="S" value="202" /><Picker.Item label="M" value="203" />
                    <Picker.Item label="L" value="204" />
                    <Picker.Item label="XL" value="205" />
                    <Picker.Item label="XXL" value="206" />
                    <Picker.Item label="Unica" value="207" />
                    <Picker.Item label="XXS" value="208" />
                    <Picker.Item label="XXXL" value="209" />
                    <Picker.Item label="Extra grande" value="210" />
                  </Picker>
                </View>
              </View>
            </ScrollView>

            <View style={styles.modalButtonsContainer}>
              <TouchableOpacity
                style={styles.cancelButton}
                onPress={toggleAddProductModal}
              >
                <Text style={styles.cancelButtonText}>Cancelar</Text>
              </TouchableOpacity>
             
              <TouchableOpacity
                style={styles.saveButton}
                onPress={selectedProductoCodigoProducto ? handleUpdateProducto : handleAddProduct}
              >
                <MaterialIcons 
                  name={selectedProductoCodigoProducto ? "save" : "add-circle-outline"} 
                  size={18} 
                  color="white" 
                  style={{ marginRight: 5 }} 
                />
                <Text style={styles.saveButtonText}>
                  {selectedProductoCodigoProducto ? "Guardar" : "Crear"}
                </Text>
              </TouchableOpacity>
            </View>
          </View>
        </Modal>
      </View>
    </View>
  );
};