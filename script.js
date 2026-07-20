function initializeSession() {
    const btn = document.getElementById('action-btn');
    const terminal = document.getElementById('terminal-output');
    
    // Disable button during simulation
    btn.disabled = true;
    btn.innerText = "Connecting to App Service...";
    
    // Show terminal and start logs
    terminal.classList.remove('hidden');
    terminal.innerText = "> Securing gateway tunnel...\n";
    
    setTimeout(() => {
        terminal.innerText += "> Connection verified via Cloud Infrastructure.\n";
    }, 800);
    
    setTimeout(() => {
        terminal.innerText += "> Handshake complete. Status: 100% Operational.";
        btn.innerText = "Session Active";
        btn.style.background = "linear-gradient(135deg, #059669 0%, #047857 100%)";
        btn.style.boxShadow = "0 4px 12px rgba(5, 150, 105, 0.4)";
    }, 1600);
}