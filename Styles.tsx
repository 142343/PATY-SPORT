import { StyleSheet } from 'react-native';

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f5f7ff',
    padding: 16,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#2a2a72',
    marginBottom: 20,
    textAlign: 'center',
  },
  titleIcon: {
    marginLeft: 10,
    textShadowColor: 'rgba(67, 97, 238, 0.7)',
    textShadowOffset: { width: 0, height: 3 },
    textShadowRadius: 6,
  },
  searchContainer: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: 'white',
    borderRadius: 12,
    paddingHorizontal: 15,
    marginBottom: 16,
    elevation: 3,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
  },
  searchIcon: {
    marginRight: 10,
  },
  searchInput: {
    flex: 1,
    height: 50,
    fontSize: 16,
  },
  clearSearchButton: {
    padding: 5,
  },
  listContainer: {
    paddingBottom: 80,
  },
  usuarioContainer: {
    backgroundColor: 'white',
    borderRadius: 12,
    padding: 16,
    marginBottom: 12,
    flexDirection: 'row',
    justifyContent: 'space-between',
    elevation: 2,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 1 },
    shadowOpacity: 0.1,
    shadowRadius: 3,
  },
  usuarioInfo: {
    flex: 1,
  },
  usuarioName: {
    fontSize: 18,
    fontWeight: 'bold',
    color: '#333',
    marginBottom: 6,
  },
  usuarioText: {
    fontSize: 14,
    color: '#666',
    marginBottom: 3,
  },
  badgeContainer: {
    flexDirection: 'row',
    marginTop: 8,
  },
  badge: {
    paddingHorizontal: 10,
    paddingVertical: 4,
    borderRadius: 12,
    marginRight: 8,
  },
  badgeText: {
    color: 'white',
    fontSize: 12,
    fontWeight: 'bold',
  },
  usuarioActions: {
    justifyContent: 'center',
    alignItems: 'flex-end',
  },
  actionButton: {
    width: 36,
    height: 36,
    borderRadius: 18,
    justifyContent: 'center',
    alignItems: 'center',
    marginBottom: 8,
  },
  backButton: {
    position: 'absolute',
    bottom: 20,
    left: 20,
    width: 50,
    height: 50,
    borderRadius: 25,
    backgroundColor: 'white',
    justifyContent: 'center',
    alignItems: 'center',
    elevation: 5,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.2,
    shadowRadius: 4,
  },
  emptyContainer: {
    alignItems: 'center',
    justifyContent: 'center',
    paddingVertical: 60,
  },
  emptyText: {
    marginTop: 10,
    fontSize: 16,
    color: '#888',
  },
  
  // Modal Styles
  detailsModalContent: {
    backgroundColor: 'white',
    borderRadius: 16,
    padding: 20,
    alignItems: 'center',
  },
  closeButton: {
    position: 'absolute',
    top: 10,
    right: 10,
    zIndex: 1,
  },
  detailsModalTitle: {
    fontSize: 22,
    fontWeight: 'bold',
    color: '#4361ee',
    marginBottom: 20,
    marginTop: 10,
  },
  userDetailCard: {
    width: '100%',
    backgroundColor: '#f9fafd',
    borderRadius: 12,
    padding: 16,
    marginBottom: 20,
  },
  userDetailHeader: {
    flexDirection: 'row',
    alignItems: 'center',
    marginBottom: 20,
    paddingBottom: 16,
    borderBottomWidth: 1,
    borderBottomColor: '#e0e0e0',
  },
  userDetailHeaderText: {
    marginLeft: 15,
    flex: 1,
  },
  userDetailName: {
    fontSize: 20,
    fontWeight: 'bold',
    color: '#333',
  },
  userDetailRole: {
    fontSize: 14,
    color: '#4361ee',
    marginTop: 4,
  },
  detailsRow: {
    marginBottom: 16,
  },
  detailItem: {
    flexDirection: 'row',
    alignItems: 'center',
  },
  detailTextContainer: {
    marginLeft: 15,
  },
  detailLabel: {
    fontSize: 12,
    color: '#888',
  },
  detailValue: {
    fontSize: 16,
    color: '#333',
    fontWeight: '500',
  },
  editButton: {
    flexDirection: 'row',
    backgroundColor: '#4361ee',
    borderRadius: 8,
    paddingVertical: 12,
    paddingHorizontal: 24,
    alignItems: 'center',
    justifyContent: 'center',
    elevation: 2,
  },
  editButtonText: {
    color: 'white',
    fontSize: 16,
    fontWeight: 'bold',
  },
  
  // Edit Modal Styles
  editModalContent: {
    backgroundColor: 'white',
    borderRadius: 16,
    padding: 20,
  },
  editModalTitle: {
    fontSize: 20,
    fontWeight: 'bold',
    color: '#4361ee',
    marginBottom: 20,
    textAlign: 'center',
  },
  editModalForm: {
    marginBottom: 20,
  },
  inputGroup: {
    marginBottom: 16,
  },
  inputLabel: {
    fontSize: 14,
    fontWeight: 'bold',
    color: '#555',
    marginBottom: 8,
  },
  modalInput: {
    backgroundColor: '#f0f2f5',
    borderRadius: 8,
    paddingHorizontal: 16,
    paddingVertical: 12,
    fontSize: 16,
  },
  radioGroup: {
    flexDirection: 'row',
    justifyContent: 'space-around',
    marginTop: 5,
  },
  radioButton: {
    backgroundColor: '#f0f2f5',
    borderRadius: 8,
    paddingVertical: 10,
    paddingHorizontal: 20,
    alignItems: 'center',
    width: '48%',
  },
  radioButtonSelected: {
    backgroundColor: '#4361ee',
  },
  radioButtonText: {
    fontSize: 14,
    color: '#555',
    fontWeight: '500',
  },
  radioButtonTextSelected: {
    color: 'white',
  },
  segmentedControl: {
    flexDirection: 'row',
    justifyContent: 'space-between',
  },
  segmentButton: {
    flex: 1,
    backgroundColor: '#f0f2f5',
    paddingVertical: 10,
    paddingHorizontal: 12
  },
  segmentButtonSelected: {
    backgroundColor: '#4361ee',
  },
  titleContainer: {
    backgroundColor: '',
  },
  segmentButtonText: {
    fontSize: 13,
    color: '#555',
    fontWeight: '500',
  },
  segmentButtonTextSelected: {
    color: 'white',
  },
  modalButtonsContainer: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginTop: 10,
  },
  cancelButton: {
    flex: 1,
    backgroundColor: '#e0e0e0',
    borderRadius: 8,
    paddingVertical: 12,
    alignItems: 'center',
    justifyContent: 'center',
    marginRight: 8,
  },
  cancelButtonText: {
    color: '#555',
    fontSize: 16,
    fontWeight: 'bold',
  },
  saveButton: {
    flex: 1,
    flexDirection: 'row',
    backgroundColor: '#4361ee',
    borderRadius: 8,
    paddingVertical: 12,
    alignItems: 'center',
    justifyContent: 'center',
    marginLeft: 8,
  },
  saveButtonText: {
    color: 'white',
    fontSize: 16,
    fontWeight: 'bold',
  },
});

export default styles;