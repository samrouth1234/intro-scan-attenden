<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog d-flex justify-content-center align-items-center min-vh-100">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrModalLabel">Scan QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="qr-placeholder mb-4 p-4 bg-light rounded">
          <!-- QR code would be dynamically inserted here -->
          <div id="qrScanner"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function showQrModal() {
    var myModal = new bootstrap.Modal(document.getElementById('qrModal'));
    myModal.show();
  }
</script>