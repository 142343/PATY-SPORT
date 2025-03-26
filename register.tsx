import React, { useState } from 'react';
import { View, Text, StyleSheet, Image, ScrollView, TouchableOpacity, TextInput, Modal, FlatList, SafeAreaView } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import useViewModel from './viewModel';
import style from './Styles';

export const RegisterScreen = () => {
  const navigation = useNavigation();
  const { Tipo_Documento, Num_Documento, Nombres, Apellidos, Teléfono, Correo, onChange, register } = useViewModel();

  // States for dropdown
  const [showDocumentoModal, setShowDocumentoModal] = useState(false);
  const [showGeneroModal, setShowGeneroModal] = useState(false);


  
  
  // Dropdown options
  const documentoOptions = [ 
    { label: 'Seleccione un tipo de documento...', value: '' },
    { label: 'C.C', value: 'C.C' },
    { label: 'PPT', value: 'PPT' },
    { label: 'T.I', value: 'T.I' }
  ];

 
  const goBack = () => {
    navigation.goBack();
  };

  // Helper functions to get display labels
  const getDocumentoLabel = () => {
    const option = documentoOptions.find(option => option.value === Tipo_Documento);
    return option ? option.label : 'Seleccione un tipo de documento...';
  };

 

  return (
    <View style={style.container}>
      {/* Header */}
      <View style={style.headerContainer}>
        <TouchableOpacity onPress={goBack}>
          <Text style={style.headerButton}>Atras</Text>
        </TouchableOpacity>
        <Text style={style.headerTitle}>Deporte & Estilo</Text>
        <TouchableOpacity>
          <Text style={style.headerButton}></Text>
        </TouchableOpacity>
      </View>
      
      <ScrollView contentContainerStyle={style.scrollContainer}>
        <View style={style.form}>
          <Text style={style.formText}>Registro de Usuario</Text>
          
          <View style={style.formRow}>
            <View style={style.formHalf}>
              <Text style={style.formLabel}>Tipo De Documento</Text>
              <TouchableOpacity 
                style={style.formSelect}
                onPress={() => setShowDocumentoModal(true)}
              >
                <Text>{getDocumentoLabel()}</Text>
              </TouchableOpacity>
            </View>

            <View style={style.formHalf}>
              <Text style={style.formLabel}>Número de Documento</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese su número de documento"
                keyboardType="numeric"
                value={Num_Documento}
                onChangeText={(text) => onChange('Num_Documento', text)}
              />
            </View>
          </View>

          <View style={style.formRow}>
            <View style={style.formHalf}>
              <Text style={style.formLabel}>Nombres</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese sus nombres"
                value={Nombres}
                onChangeText={(text) => onChange('Nombres', text)}
              />
            </View>

            <View style={style.formHalf}>
              <Text style={style.formLabel}>Apellidos</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese sus apellidos"
                value={Apellidos}
                onChangeText={(text) => onChange('Apellidos', text)}
              />
            </View>
          </View>

          <View style={style.formRow}>
            <View style={style.formHalf}>
              <Text style={style.formLabel}>Teléfono</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese su teléfono"
                keyboardType="phone-pad"
                maxLength={10}
                value={Teléfono}
                onChangeText={(text) => onChange('Teléfono', text)}
              />
            </View>

            <View style={style.formHalf}>
              <Text style={style.formLabel}>Correo Electrónico</Text>
              <TextInput
                style={style.formInput}
                placeholder="Ingrese su correo electrónico"
                keyboardType="email-address"
                value={Correo}
                onChangeText={(text) => onChange('Correo', text)}
              />
            </View>
          </View>


          <View style={{ marginTop: 30, alignItems: 'center' }}>
            <TouchableOpacity style={style.registerButton} onPress={() => register()}>
              <Text style={style.registerButtonText}>Registrarse</Text>
            </TouchableOpacity>
          </View>
          
          <View style={style.loginContainer}>
            <Text style={style.loginText}>¿Ya tienes una cuenta?</Text>
            <TouchableOpacity onPress={goBack}>
              <Text style={style.loginLink}>Iniciar sesión</Text>
            </TouchableOpacity>
          </View>
        </View>
      </ScrollView>

      {/* Footer */}
      <View style={style.footer}>
        <Text style={style.footerText}>Contacto: Patysport90@gmail.com | Teléfono: 3102283419</Text>
      </View>

      {/* Documento Type Modal */}
      <Modal
        visible={showDocumentoModal}
        transparent={true}
        animationType="slide"
        onRequestClose={() => setShowDocumentoModal(false)}
      >
        <View style={style.modalContainer}>
          <View style={style.modalContent}>
            <Text style={style.modalTitle}>Seleccione tipo de documento</Text>
            <FlatList
              data={documentoOptions}
              keyExtractor={(item) => item.value}
              renderItem={({ item }) => (
                <TouchableOpacity
                  style={style.modalItem}
                  onPress={() => {
                    onChange('Tipo_Documento', item.value);
                    setShowDocumentoModal(false);
                  }}
                >
                  <Text style={style.modalItemText}>{item.label}</Text>
                </TouchableOpacity>
              )}
            />
            <TouchableOpacity 
              style={style.closeButton}
              onPress={() => setShowDocumentoModal(false)}
            >
              <Text style={style.closeButtonText}>Cerrar</Text>
            </TouchableOpacity>
          </View>
        </View>
      </Modal>

      {/* Género Modal */}
      <Modal
        visible={showGeneroModal}
        transparent={true}
        animationType="slide"
        onRequestClose={() => setShowGeneroModal(false)}
      >
      </Modal>
    </View>
  );
};

export default RegisterScreen;