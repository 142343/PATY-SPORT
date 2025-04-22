import { StackScreenProps } from '@react-navigation/stack';
import React, { useEffect, useState } from 'react';
import { View, Text, FlatList, TextInput, TouchableOpacity, Alert } from 'react-native';
import { RootStackParamList } from '../../../../App';
import useViewModel from './ViewModal';
import Ionicons from 'react-native-vector-icons/Ionicons';
import MaterialIcons from 'react-native-vector-icons/MaterialIcons';
import Modal from 'react-native-modal';
import styles from './Styles';

import {
  getUsuario,
  updateUsuario,
} from '../../../Data/sources/remote/api/api';

interface Usuario {
  Num_Documento: number;
  Tipo_Documento: string;
  Nombres: string;
  Apellidos: string;
  Teléfono: string;
  Correo: string;
  RolIdRol: number;
  EstadoCodigoEstado: string;
  GeneroidGenero: number;
}

interface Props extends StackScreenProps<RootStackParamList, 'Usuario'> {}

export const Usuario = ({ navigation }: Props) => {
  const [usuarios, setUsuarios] = useState<Usuario[]>([]);
  const [selectedUsuario, setSelectedUsuario] = useState<Usuario | null>(null);
  const [isEditModalVisible, setEditModalVisible] = useState(false);
  const [isDetailsModalVisible, setDetailsModalVisible] = useState(false);
  const [searchText, setSearchText] = useState('');
  const [filteredUsuarios, setFilteredUsuarios] = useState<Usuario[]>([]);
  
  // Edit form fields
  const [editNombres, setEditNombres] = useState('');
  const [editApellidos, setEditApellidos] = useState('');
  const [editTeléfono, setEditTeléfono] = useState('');
  const [editCorreo, setEditCorreo] = useState('');
  const [editEstadoCodigoEstado, setEditEstadoCodigoEstado] = useState('');
  const [editRolIdRol, setEditRolIdRol] = useState('');
  const [editGeneroidGenero, setEditGeneroidGenero] = useState('');

  useEffect(() => {
    fetchUsuarios();
  }, []);

  useEffect(() => {
    if (searchText === '') {
      setFilteredUsuarios(usuarios);
    } else {
      const filtered = usuarios.filter(
        (usuario) =>
          usuario.Nombres?.toLowerCase().includes(searchText.toLowerCase()) ||
          usuario.Apellidos?.toLowerCase().includes(searchText.toLowerCase()) ||
          usuario.Correo?.toLowerCase().includes(searchText.toLowerCase()) ||
          (usuario.Num_Documento?.toString() || '').includes(searchText)
      );
      setFilteredUsuarios(filtered);
    }
  }, [searchText, usuarios]);

  const fetchUsuarios = async () => {
    try {
      const data = await getUsuario();
      if (data && Array.isArray(data)) {
        setUsuarios(data);
        setFilteredUsuarios(data);
      } else {
        console.error('Unexpected data format:', data);
        setUsuarios([]);
        setFilteredUsuarios([]);
      }
    } catch (error) {
      console.error('Error fetching usuarios:', error);
      Alert.alert('Error', 'No se pudieron cargar los usuarios');
    }
  };

  const handleUpdateUsuario = async () => {
    if (selectedUsuario && selectedUsuario.Num_Documento) {
      try {
        const updatedUsuario = {
          Nombres: editNombres,
          Apellidos: editApellidos,
          Teléfono: editTeléfono,
          Correo: editCorreo,
          EstadoCodigoEstado: editEstadoCodigoEstado,
          RolIdRol: parseInt(editRolIdRol) || selectedUsuario.RolIdRol,
          GeneroidGenero: parseInt(editGeneroidGenero) || selectedUsuario.GeneroidGenero
        };

        await updateUsuario(selectedUsuario.Num_Documento, updatedUsuario);
        
        // Update local state
        setUsuarios(usuarios.map(u => 
          u.Num_Documento === selectedUsuario.Num_Documento 
            ? {...u, ...updatedUsuario} 
            : u
        ));
        
        toggleEditModal();
        
        Alert.alert(
          '¡Actualización exitosa!',
          'El usuario ha sido actualizado correctamente.',
          [{ text: 'OK', style: 'default' }]
        );
      } catch (error) {
        console.error('Error updating usuario:', error);
        Alert.alert(
          'Error',
          'No se pudo actualizar el usuario.',
          [{ text: 'OK', style: 'destructive' }]
        );
      }
    } else {
      Alert.alert('Error', 'No se pudo identificar el usuario a actualizar');
    }
  };

  const openEditModal = (usuario: Usuario) => {
    setSelectedUsuario(usuario);
    setEditNombres(usuario.Nombres || '');
    setEditApellidos(usuario.Apellidos || '');
    setEditTeléfono(usuario.Teléfono || '');
    setEditCorreo(usuario.Correo || '');
    setEditEstadoCodigoEstado(usuario.EstadoCodigoEstado || '');
    setEditRolIdRol((usuario.RolIdRol || '').toString());
    setEditGeneroidGenero((usuario.GeneroidGenero || '').toString());
    toggleEditModal();
  };

  const openDetailsModal = (usuario: Usuario) => {
    setSelectedUsuario(usuario);
    toggleDetailsModal();
  };

  const toggleEditModal = () => {
    setEditModalVisible(!isEditModalVisible);
  };

  const toggleDetailsModal = () => {
    setDetailsModalVisible(!isDetailsModalVisible);
  };

  const getEstadoText = (codigo: string) => {
    if (!codigo) return 'No definido';
    
    switch (codigo) {
      case '101': return 'ACTIVO';
      case '102': return 'INACTIVO';
      default: return codigo;
    }
  };

  const getRolText = (id: number) => {
    if (id === undefined || id === null) return 'Rol no definido';
    
    switch (id) {
      case 21: return 'Cliente';
      case 22: return 'Administrador';
      case 23: return 'Vendedor';
      case 24: return 'Proveedor';
      case 25: return 'Usuario';
      default: return `Rol ${id}`;
    }
  };

  const getGeneroText = (id: number) => {
    if (id === undefined || id === null) return 'No definido';
    
    switch (id) {
      case 1: return 'Masculino';
      case 2: return 'Femenino';
      case 3: return 'Otro';
      case 4: return 'No especificado';
      default: return `Género ${id}`;
    }
  };

  const getTipoDocumentoText = (tipo: string) => {
    if (!tipo) return 'No definido';
    
    switch (tipo) {
      case 'C.C': return 'Cédula de Ciudadanía';
      case 'T.I': return 'Tarjeta de Identidad';
      case 'PPT': return 'Permiso por Protección Temporal';
      default: return tipo;
    }
  };

  const renderUsuarioItem = ({ item }: { item: Usuario }) => (
    <View style={styles.usuarioContainer}>
      <View style={styles.usuarioInfo}>
        <Text style={styles.usuarioName}>{item.Nombres || ''} {item.Apellidos || ''}</Text>
        <Text style={styles.usuarioText}>Documento: {getTipoDocumentoText(item.Tipo_Documento)} {item.Num_Documento?.toString() || ''}</Text>
        <Text style={styles.usuarioText}>Correo: {item.Correo || ''}</Text>
        <Text style={styles.usuarioText}>Teléfono: {item.Teléfono || ''}</Text>
        
        <View style={styles.badgeContainer}>
          <View style={[styles.badge, { backgroundColor: item.EstadoCodigoEstado === '101' ? '#4CAF50' : '#FF5722' }]}>
            <Text style={styles.badgeText}>{getEstadoText(item.EstadoCodigoEstado)}</Text>
          </View>
          <View style={[styles.badge, { backgroundColor: '#3F51B5' }]}>
            <Text style={styles.badgeText}>{getRolText(item.RolIdRol)}</Text>
          </View>
        </View>
      </View>
      
      <View style={styles.usuarioActions}>
        <TouchableOpacity 
          style={[styles.actionButton, { backgroundColor: '#4361ee' }]}
          onPress={() => openDetailsModal(item)}
        >
          <MaterialIcons name="visibility" size={18} color="white" />
        </TouchableOpacity>
        <TouchableOpacity 
          style={[styles.actionButton, { backgroundColor: '#FFC107' }]}
          onPress={() => openEditModal(item)}
        >
          <MaterialIcons name="edit" size={18} color="white" />
        </TouchableOpacity>
      </View>
    </View>
  );

  const { removeSeccion } = useViewModel();

  return (
    <View style={styles.container}>
      <View style={styles.titleContainer}>
        <Text style={styles.title}>
          Gestión de Usuarios
          <Ionicons name="people" size={28} color="#4361ee" style={styles.titleIcon} />
        </Text>
       
      </View>

      <View style={styles.searchContainer}>
        <Ionicons name="search" size={20} color="#4361ee" style={styles.searchIcon} />
        <TextInput
          style={styles.searchInput}
          placeholder="Buscar usuario por nombre, correo o documento..."
          value={searchText}
          onChangeText={setSearchText}
        />
        {searchText.length > 0 && (
          <TouchableOpacity onPress={() => setSearchText('')} style={styles.clearSearchButton}>
            <Ionicons name="close-circle" size={20} color="#888" />
          </TouchableOpacity>
        )}
      </View>

      <FlatList
        data={filteredUsuarios}
        keyExtractor={(item) => (item.Num_Documento?.toString() || Math.random().toString())}
        renderItem={renderUsuarioItem}
        showsVerticalScrollIndicator={false}
        contentContainerStyle={styles.listContainer}
        ListEmptyComponent={
          <View style={styles.emptyContainer}>
            <Ionicons name="people-outline" size={60} color="#ccc" />
            <Text style={styles.emptyText}>No se encontraron usuarios</Text>
          </View>
        }
      />
      
      <TouchableOpacity onPress={() => navigation.goBack()} style={styles.backButton}>
        <Ionicons name="arrow-back" size={30} color="#4361ee" />
      </TouchableOpacity>

      {/* Usuario Details Modal */}
      <Modal
        isVisible={isDetailsModalVisible}
        backdropOpacity={0.6}
        onBackdropPress={toggleDetailsModal}
        animationIn="fadeIn"
        animationOut="fadeOut"
      >
        {selectedUsuario && (
          <View style={styles.detailsModalContent}>
            <TouchableOpacity onPress={toggleDetailsModal} style={styles.closeButton}>
              <Ionicons name="close-circle" size={30} color="#4361ee" />
            </TouchableOpacity>
            
            <Text style={styles.detailsModalTitle}>Detalles del Usuario</Text>
            
            <View style={styles.userDetailCard}>
              <View style={styles.userDetailHeader}>
                <Ionicons name="person-circle" size={60} color="#4361ee" />
                <View style={styles.userDetailHeaderText}>
                  <Text style={styles.userDetailName}>{selectedUsuario.Nombres || ''} {selectedUsuario.Apellidos || ''}</Text>
                  <Text style={styles.userDetailRole}>{getRolText(selectedUsuario.RolIdRol)}</Text>
                </View>
              </View>
              
              <View style={styles.detailsRow}>
                <View style={styles.detailItem}>
                  <Ionicons name="card" size={20} color="#4361ee" />
                  <View style={styles.detailTextContainer}>
                    <Text style={styles.detailLabel}>Documento</Text>
                    <Text style={styles.detailValue}>
                      {getTipoDocumentoText(selectedUsuario.Tipo_Documento)} {selectedUsuario.Num_Documento?.toString() || ''}
                    </Text>
                  </View>
                </View>
              </View>
              
              <View style={styles.detailsRow}>
                <View style={styles.detailItem}>
                  <Ionicons name="mail" size={20} color="#4361ee" />
                  <View style={styles.detailTextContainer}>
                    <Text style={styles.detailLabel}>Correo electrónico</Text>
                    <Text style={styles.detailValue}>{selectedUsuario.Correo || ''}</Text>
                  </View>
                </View>
              </View>
              
              <View style={styles.detailsRow}>
                <View style={styles.detailItem}>
                  <Ionicons name="call" size={20} color="#4361ee" />
                  <View style={styles.detailTextContainer}>
                    <Text style={styles.detailLabel}>Teléfono</Text>
                    <Text style={styles.detailValue}>{selectedUsuario.Teléfono || ''}</Text>
                  </View>
                </View>
              </View>
              
              <View style={styles.detailsRow}>
                <View style={styles.detailItem}>
                  <Ionicons name="transgender" size={20} color="#4361ee" />
                  <View style={styles.detailTextContainer}>
                    <Text style={styles.detailLabel}>Género</Text>
                    <Text style={styles.detailValue}>{getGeneroText(selectedUsuario.GeneroidGenero)}</Text>
                  </View>
                </View>
              </View>
              
              <View style={styles.detailsRow}>
                <View style={styles.detailItem}>
                  <Ionicons name="checkmark-circle" size={20} color={selectedUsuario.EstadoCodigoEstado === '101' ? '#4CAF50' : '#FF5722'} />
                  <View style={styles.detailTextContainer}>
                    <Text style={styles.detailLabel}>Estado</Text>
                    <Text style={[styles.detailValue, { 
                      color: selectedUsuario.EstadoCodigoEstado === '101' ? '#4CAF50' : '#FF5722' 
                    }]}>{getEstadoText(selectedUsuario.EstadoCodigoEstado)}</Text>
                  </View>
                </View>
              </View>
            </View>
            
            <TouchableOpacity 
              style={styles.editButton}
              onPress={() => {
                toggleDetailsModal();
                openEditModal(selectedUsuario);
              }}
            >
              <MaterialIcons name="edit" size={20} color="white" style={{ marginRight: 8 }} />
              <Text style={styles.editButtonText}>Editar Usuario</Text>
            </TouchableOpacity>
          </View>
        )}
      </Modal>

      {/* Edit Usuario Modal */}
      <Modal
        isVisible={isEditModalVisible}
        backdropOpacity={0.7}
        onBackdropPress={toggleEditModal}
        animationIn="slideInUp"
        animationOut="slideOutDown"
      >
        {selectedUsuario && (
          <View style={styles.editModalContent}>
            <Text style={styles.editModalTitle}>Editar Usuario</Text>
            
            <View style={styles.editModalForm}>
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Nombres:</Text>
                <TextInput
                  style={styles.modalInput}
                  placeholder="Nombres"
                  value={editNombres}
                  onChangeText={setEditNombres}
                />
              </View>
              
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Apellidos:</Text>
                <TextInput
                  style={styles.modalInput}
                  placeholder="Apellidos"
                  value={editApellidos}
                  onChangeText={setEditApellidos}
                />
              </View>
              
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Teléfono:</Text>
                <TextInput
                  style={styles.modalInput}
                  placeholder="Teléfono"
                  value={editTeléfono}
                  onChangeText={setEditTeléfono}
                  keyboardType="phone-pad"
                />
              </View>
              
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Correo:</Text>
                <TextInput
                  style={styles.modalInput}
                  placeholder="Correo electrónico"
                  value={editCorreo}
                  onChangeText={setEditCorreo}
                  keyboardType="email-address"
                />
              </View>
              
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Estado:</Text>
                <View style={styles.radioGroup}>
                  <TouchableOpacity
                    style={[
                      styles.radioButton,
                      editEstadoCodigoEstado === '101' && styles.radioButtonSelected
                    ]}
                    onPress={() => setEditEstadoCodigoEstado('101')}
                  >
                    <Text style={[
                      styles.radioButtonText,
                      editEstadoCodigoEstado === '101' && styles.radioButtonTextSelected
                    ]}>ACTIVO</Text>
                  </TouchableOpacity>
                  
                  <TouchableOpacity
                    style={[
                      styles.radioButton,
                      editEstadoCodigoEstado === '102' && styles.radioButtonSelected
                    ]}
                    onPress={() => setEditEstadoCodigoEstado('102')}
                  >
                    <Text style={[
                      styles.radioButtonText,
                      editEstadoCodigoEstado === '102' && styles.radioButtonTextSelected
                    ]}>INACTIVO</Text>
                  </TouchableOpacity>
                </View>
              </View>
              
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Rol:</Text>
                <View style={styles.segmentedControl}>
                  {[
                    { id: '21', label: 'Cliente' },
                    { id: '22', label: 'Admin' },
                    { id: '25', label: 'Usuario' }
                  ].map((rol) => (
                    <TouchableOpacity
                      key={rol.id}
                      style={[
                        styles.segmentButton,
                        editRolIdRol === rol.id && styles.segmentButtonSelected
                      ]}
                      onPress={() => setEditRolIdRol(rol.id)}
                    >
                      <Text style={[
                        styles.segmentButtonText,
                        editRolIdRol === rol.id && styles.segmentButtonTextSelected
                      ]}>{rol.label}</Text>
                    </TouchableOpacity>
                  ))}
                </View>
              </View>
              
              <View style={styles.inputGroup}>
                <Text style={styles.inputLabel}>Género:</Text>
                <View style={styles.segmentedControl}>
                  {[
                    { id: '1', label: 'Masculino' },
                    { id: '2', label: 'Femenino' },
                    { id: '3', label: 'Otro' }
                  ].map((genero) => (
                    <TouchableOpacity
                      key={genero.id}
                      style={[
                        styles.segmentButton,
                        editGeneroidGenero === genero.id && styles.segmentButtonSelected
                      ]}
                      onPress={() => setEditGeneroidGenero(genero.id)}
                    >
                      <Text style={[
                        styles.segmentButtonText,
                        editGeneroidGenero === genero.id && styles.segmentButtonTextSelected
                      ]}>{genero.label}</Text>
                    </TouchableOpacity>
                  ))}
                </View>
              </View>
            </View>

            <View style={styles.modalButtonsContainer}>
              <TouchableOpacity
                style={styles.cancelButton}
                onPress={toggleEditModal}
              >
                <Text style={styles.cancelButtonText}>Cancelar</Text>
              </TouchableOpacity>
              
              <TouchableOpacity
                style={styles.saveButton}
                onPress={handleUpdateUsuario}
              >
                <MaterialIcons name="save" size={18} color="white" style={{ marginRight: 5 }} />
                <Text style={styles.saveButtonText}>Guardar Cambios</Text>
              </TouchableOpacity>
            </View>
          </View>
        )}
      </Modal>
    </View>
  );
};