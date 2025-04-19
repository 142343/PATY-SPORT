import { StyleSheet } from "react-native";

const ProfileInfostyles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 20,
    backgroundColor: '#f0f4ff', // Color de fondo más fresco
    position: 'relative',
  },
  backgroundImage: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    opacity: 0.08, // Opacidad baja para no interferir con el contenido
    backgroundColor: '#f0f4ff',
  },
  patternOverlay: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    opacity: 0.05,
  },
  title: {
    fontSize: 32,
    fontWeight: '700',
    marginBottom: 30,
    textAlign: 'center',
    color: '#3a0ca3', // tono más cálido pero elegante
    marginTop: -8,
    letterSpacing: 1,
    textShadowColor: 'rgba(58, 12, 163, 0.2)',
    textShadowOffset: { width: 0, height: 3 },
    textShadowRadius: 4,
    marginLeft: 40, // ligeramente menos para equilibrio visual
    paddingHorizontal: 10,
    borderBottomWidth: 2,
    borderBottomColor: '#cdb4db', // una línea suave abajo como detalle
  },
  
  
  productContainer: {
    padding: 18,
    backgroundColor: '#fff',
    borderRadius: 16, // Bordes más redondeados
    marginBottom: 15,
    shadowColor: '#4361ee', // Sombra del color principal
    shadowOffset: { width: 0, height: 5 },
    shadowOpacity: 0.15,
    shadowRadius: 10,
    elevation: 6,
    borderLeftWidth: 5, // Borde izquierdo para dar estilo
    borderLeftColor: '#4361ee', // Color principal
  },
  productText: {
    fontSize: 16,
    marginBottom: 12,
    color: '#3a3a3a', // Color de texto más oscuro para mejor contraste
    lineHeight: 22, // Mejor espaciado entre líneas
  },
  buttonContainer: {
    flexDirection: 'row',
    justifyContent: 'flex-end', // Alineados a la derecha
  },
  button: {
    backgroundColor: '#4361ee', // Color principal
    paddingVertical: 10,
    paddingHorizontal: 15,
    borderRadius: 10,
    marginHorizontal: 5,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 3 },
    shadowOpacity: 0.15,
    shadowRadius: 5,
    elevation: 3,
  },
  buttonText: {
    color: 'white',
    fontWeight: '600',
    fontSize: 14,
    letterSpacing: 0.3,
  },
  input: {
    height: 50,
    borderColor: '#d0d9f0',
    borderWidth: 1.5,
    borderRadius: 12,
    marginBottom: 15,
    paddingHorizontal: 15,
    backgroundColor: '#fff',
    fontSize: 16,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.07,
    shadowRadius: 3,
    elevation: 2,
  },
  addNewButton: {
    backgroundColor: '#3ccfda', // Color complementario vibrante
    padding: 15,
    borderRadius: 12,
    marginVertical: 15,
    alignItems: 'center',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 4 },
    shadowOpacity: 0.15,
    shadowRadius: 8,
    elevation: 4,
    marginTop: -17,
  },
  addNewButtonText: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 16,
    letterSpacing: 0.5,
  },
  searchButton: {
    backgroundColor: '#f7b801', // Amarillo más vibrante
    padding: 15,
    borderRadius: 12,
    alignItems: 'center',
    marginBottom: 15,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 3 },
    shadowOpacity: 0.15,
    shadowRadius: 6,
    elevation: 3,
  },
  searchButtonText: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 15,
    letterSpacing: 0.5,
  },
  reportButton: {
    backgroundColor: '#f25f5c', // Rosa más vibrante
    padding: 15,
    borderRadius: 12,
    alignItems: 'center',
    marginBottom: 15,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 3 },
    shadowOpacity: 0.15,
    shadowRadius: 6,
    elevation: 3,
  },
  reportButtonText: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 15,
    letterSpacing: 0.5,
  },
  modalContainer: {
    justifyContent: 'center',
    alignItems: 'center',
    margin: 0, // Sin margen para que ocupe toda la pantalla
  },
  modalContent1: {
    width: '90%',
    maxHeight: 500,
    backgroundColor: 'white',
    borderRadius: 20, // Más redondeado
    padding: 25,
    elevation: 10,
    shadowColor: '#4361ee',
    shadowOffset: { width: 0, height: 6 },
    shadowOpacity: 0.25,
    shadowRadius: 12,
  },
  closeButton1: {
    position: 'absolute',
    top: 15,
    right: 15,
    zIndex: 2,
  },
  modalTitle: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 20,
    textAlign: 'center',
    color: '#4361ee',
    letterSpacing: 0.5,
  },
  modalTitle1: {
    fontSize: 24,
    fontWeight: 'bold',
    textAlign: 'center',
    marginBottom: 20,
    color: '#4361ee',
    letterSpacing: 0.5,
  },
  modalText: {
    fontSize: 16,
    marginBottom: 10,
    padding: 14,
    borderRadius: 12,
    // Color se asigna dinámicamente en getPastelColor
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 3,
    elevation: 2,
  },
  scrollView: {
    maxHeight: 350,
    borderRadius: 10,
    paddingRight: 5, // Espacio para el scroll
  },
  productModalContent: {
    backgroundColor: 'white',
    padding: 25,
    borderRadius: 20,
    maxHeight: '90%',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 8 },
    shadowOpacity: 0.25,
    shadowRadius: 15,
    elevation: 12,
  },
  modalInput: {
    borderWidth: 1.5,
    borderColor: '#d0d9f0', // Color de borde suave
    padding: 14,
    borderRadius: 10,
    fontSize: 15,
    backgroundColor: 'white',
    marginBottom: 6,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 1 },
    shadowOpacity: 0.05,
    shadowRadius: 2,
    elevation: 1,
  },
  modalPicker: {
    backgroundColor: '#f9faff',
    borderRadius: 10,
  },
  pickerContainer: {
    borderWidth: 1.5,
    borderColor: '#d0d9f0',
    borderRadius: 10,
    overflow: 'hidden',
    marginBottom: 15,
    backgroundColor: '#f9faff',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 1 },
    shadowOpacity: 0.05,
    shadowRadius: 2,
    elevation: 1,
  },
  modalButtonsContainer: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginTop: 25,
  },
  saveButton: {
    backgroundColor: '#3ccfda', // Color complementario
    paddingVertical: 15,
    paddingHorizontal: 20,
    borderRadius: 12,
    flex: 1,
    marginLeft: 8,
    alignItems: 'center',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 3 },
    shadowOpacity: 0.15,
    shadowRadius: 5,
    elevation: 3,
  },
  saveButtonText: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 16,
    letterSpacing: 0.5,
  },
  cancelButton: {
    backgroundColor: '#f1f4ff',
    paddingVertical: 15,
    paddingHorizontal: 20,
    borderRadius: 12,
    borderWidth: 1.5,
    borderColor: '#d0d9f0',
    flex: 1,
    marginRight: 8,
    alignItems: 'center',
  },
  cancelButtonText: {
    color: '#4361ee',
    fontWeight: '600',
    fontSize: 16,
    letterSpacing: 0.3,
  },
  modalScrollView: {
    maxHeight: 450,
  },
  inputGroup: {
    marginBottom: 15,
  },
  rowInputs: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginBottom: 15,
  },
  halfInput: {
    width: '48%',
  },
  inputLabel: {
    fontSize: 14,
    fontWeight: '600',
    color: '#4361ee', // Color principal
    marginBottom: 5,
    letterSpacing: 0.3,
  },
  backButton: {
    position: 'absolute',
    top: 20,
    left: 15,
    zIndex: 10,
    padding: 12,
    backgroundColor: 'rgba(255, 255, 255, 0.95)', // Fondo semi-transparente
    borderRadius: 25,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 3 },
    shadowOpacity: 0.15,
    shadowRadius: 5,
    elevation: 3,
  },
  
  imageBackground: {
    width: '100%',
    height: '100%',
    position: 'absolute',
    opacity: 0.7,
},
loadingContainer: {
  flex: 1,
  justifyContent: 'center',
  alignItems: 'center',
},
loadingText: {
  marginTop: 10,
  fontSize: 16,
  color: '#4361ee',
},


errorContainer: {
  flex: 1,
  justifyContent: 'center',
  alignItems: 'center',
  padding: 20,
},
errorText: {
  fontSize: 16,
  color: '#f25f5c',
  textAlign: 'center',
  marginBottom: 15,
},
retryButton: {
  backgroundColor: '#4361ee',
  paddingVertical: 10,
  paddingHorizontal: 20,
  borderRadius: 8,
},
retryButtonText: {
  color: 'white',
  fontWeight: '600',
  fontSize: 14,
},

emptyText: {
  textAlign: 'center',
  fontSize: 16,
  color: '#666',
  marginTop: 20,
  fontStyle: 'italic',
},
});

export default ProfileInfostyles;