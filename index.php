<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Texto a PDF</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2.5rem;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 40px;
            font-size: 1.1rem;
        }
        
        .upload-area {
            border: 3px dashed #ddd;
            border-radius: 15px;
            padding: 40px;
            margin: 30px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fafafa;
        }
        
        .upload-area:hover {
            border-color: #667eea;
            background: #f0f4ff;
        }
        
        .upload-area.dragover {
            border-color: #667eea;
            background: #e8f2ff;
            transform: scale(1.02);
        }
        
        .upload-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .upload-text {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }
        
        .upload-subtext {
            color: #666;
            font-size: 0.9rem;
        }
        
        .file-info {
            background: #e8f5e8;
            border: 1px solid #4caf50;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            display: none;
        }
        
        .file-name {
            font-weight: bold;
            color: #2e7d32;
            margin-bottom: 5px;
        }
        
        .file-size {
            color: #666;
            font-size: 0.9rem;
        }
        
        .convert-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 20px 0;
            display: none;
        }
        
        .convert-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .download-btn {
            background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 20px 0;
            display: none;
        }
        
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(76, 175, 80, 0.3);
        }
        
        .loading {
            display: none;
            margin: 20px 0;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .status {
            margin: 20px 0;
            padding: 15px;
            border-radius: 10px;
            display: none;
        }
        
        .status.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .status.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        #fileInput {
            display: none;
        }
        
        .supported-formats {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .supported-formats h3 {
            color: #333;
            margin-bottom: 15px;
        }
        
        .format-tags {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .format-tag {
            background: #667eea;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📄 Conversor de Texto a PDF</h1>
        <p class="subtitle">Convierte cualquier archivo de texto a PDF de forma rápida y sencilla</p>
        
        <div class="upload-area" id="uploadArea">
            <div class="upload-icon">📁</div>
            <div class="upload-text">Selecciona un archivo de texto</div>
            <div class="upload-subtext">o arrastra el archivo aquí</div>
            <input type="file" id="fileInput" accept=".txt,.docx,.rtf">
        </div>
        
        <div class="file-info" id="fileInfo">
            <div class="file-name" id="fileName"></div>
            <div class="file-size" id="fileSize"></div>
        </div>
        
        <button class="convert-btn" id="convertBtn">
            🔄 Convertir a PDF
        </button>
        
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Convirtiendo archivo...</p>
        </div>
        
        <div class="status" id="status"></div>
        
        <button class="download-btn" id="downloadBtn">
            📥 Descargar PDF
        </button>
        
        <div class="supported-formats">
            <h3>Formatos soportados</h3>
            <div class="format-tags">
                <span class="format-tag">TXT</span>
                <span class="format-tag">DOCX</span>
                <span class="format-tag">RTF</span>
            </div>
        </div>
    </div>

    <!-- PDF-lib CDN -->
    <script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
    
    <script>
        console.log('🚀 Conversor de Texto a PDF iniciado');
        
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const convertBtn = document.getElementById('convertBtn');
        const loading = document.getElementById('loading');
        const status = document.getElementById('status');
        const downloadBtn = document.getElementById('downloadBtn');
        
        let selectedFile = null;
        let pdfBlob = null;
        
        // Configurar eventos
        uploadArea.addEventListener('click', () => {
            console.log('🖱️ Click en área de subida');
            fileInput.click();
        });
        
        fileInput.addEventListener('change', (e) => {
            console.log('📁 Archivo seleccionado');
            handleFileSelect(e.target.files[0]);
        });
        
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });
        
        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });
        
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            console.log('🎯 Archivo arrastrado');
            handleFileSelect(e.dataTransfer.files[0]);
        });
        
        convertBtn.addEventListener('click', () => {
            console.log('🔄 Iniciando conversión');
            convertToPDF();
        });
        
        downloadBtn.addEventListener('click', () => {
            console.log('📥 Descargando PDF');
            downloadPDF();
        });
        
        function handleFileSelect(file) {
            if (!file) return;
            
            console.log('📄 Archivo:', file.name, 'Tamaño:', file.size);
            
            // Validar archivo
            if (!validateFile(file)) {
                return;
            }
            
            selectedFile = file;
            
            // Mostrar información del archivo
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            fileInfo.style.display = 'block';
            
            // Mostrar botón de conversión
            convertBtn.style.display = 'inline-block';
            
            // Ocultar otros elementos
            downloadBtn.style.display = 'none';
            status.style.display = 'none';
            
            console.log('✅ Archivo procesado correctamente');
        }
        
        function validateFile(file) {
            const allowedTypes = ['text/plain', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/rtf'];
            const allowedExtensions = ['txt', 'docx', 'rtf'];
            const maxSize = 10 * 1024 * 1024; // 10MB
            
            const fileExtension = file.name.split('.').pop().toLowerCase();
            
            if (file.size > maxSize) {
                showStatus('El archivo es demasiado grande. Máximo 10MB', 'error');
                return false;
            }
            
            if (!allowedTypes.includes(file.type) && !allowedExtensions.includes(fileExtension)) {
                showStatus('Tipo de archivo no soportado. Formatos permitidos: TXT, DOCX, RTF', 'error');
                return false;
            }
            
            return true;
        }
        
        async function convertToPDF() {
            if (!selectedFile) return;
            
            console.log('🔄 Convirtiendo archivo a PDF...');
            
            // Mostrar loading
            convertBtn.style.display = 'none';
            loading.style.display = 'block';
            status.style.display = 'none';
            
            try {
                // Leer contenido del archivo
                const content = await readFileContent(selectedFile);
                console.log('📖 Contenido leído:', content.length, 'caracteres');
                
                // Crear PDF
                const pdfDoc = await PDFLib.PDFDocument.create();
                const page = pdfDoc.addPage([595.28, 841.89]); // A4
                
                // Configurar fuente y tamaño
                const fontSize = 12;
                const lineHeight = fontSize * 1.2;
                const margin = 50;
                const maxWidth = page.getWidth() - (margin * 2);
                const maxHeight = page.getHeight() - (margin * 2);
                
                // Dividir texto en líneas
                const lines = wrapText(content, maxWidth, fontSize);
                
                let currentPage = page;
                let y = currentPage.getHeight() - margin;
                
                for (const line of lines) {
                    // Verificar si necesitamos una nueva página
                    if (y < margin + fontSize) {
                        currentPage = pdfDoc.addPage([595.28, 841.89]);
                        y = currentPage.getHeight() - margin;
                    }
                    
                    // Dibujar línea de texto
                    try {
                        currentPage.drawText(line, {
                            x: margin,
                            y: y - fontSize,
                            size: fontSize,
                            color: PDFLib.rgb(0, 0, 0),
                        });
                    } catch (textError) {
                        console.warn('⚠️ Error al dibujar línea:', line, textError);
                        // Si hay error con la línea, intentar con caracteres seguros
                        const safeLine = line.replace(/[^\x20-\x7E]/g, '?');
                        currentPage.drawText(safeLine, {
                            x: margin,
                            y: y - fontSize,
                            size: fontSize,
                            color: PDFLib.rgb(0, 0, 0),
                        });
                    }
                    
                    y -= lineHeight;
                }
                
                // Generar PDF
                const pdfBytes = await pdfDoc.save();
                pdfBlob = new Blob([pdfBytes], { type: 'application/pdf' });
                
                console.log('✅ PDF generado exitosamente');
                
                // Mostrar éxito
                showStatus('¡Archivo convertido a PDF exitosamente!', 'success');
                downloadBtn.style.display = 'inline-block';
                
            } catch (error) {
                console.error('❌ Error al convertir:', error);
                showStatus('Error al convertir el archivo: ' + error.message, 'error');
            } finally {
                loading.style.display = 'none';
            }
        }
        
        async function readFileContent(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                
                reader.onload = (e) => {
                    let content = e.target.result;
                    
                    // Procesar según el tipo de archivo
                    if (file.name.endsWith('.docx')) {
                        // Para DOCX, extraer texto básico (simplificado)
                        content = content.replace(/<[^>]*>/g, ''); // Remover HTML tags
                        content = content.replace(/\s+/g, ' ').trim(); // Limpiar espacios
                    } else if (file.name.endsWith('.rtf')) {
                        // Para RTF, extraer texto básico (simplificado)
                        content = content.replace(/\{[^}]*\}/g, ''); // Remover comandos RTF
                        content = content.replace(/\\[a-z]+\d*\s?/g, ''); // Remover comandos RTF
                    }
                    
                    // Limpiar caracteres problemáticos para PDF-lib
                    content = cleanTextForPDF(content);
                    
                    resolve(content);
                };
                
                reader.onerror = () => reject(new Error('Error al leer el archivo'));
                
                if (file.name.endsWith('.txt')) {
                    reader.readAsText(file, 'UTF-8');
                } else {
                    reader.readAsText(file);
                }
            });
        }
        
        function cleanTextForPDF(text) {
            // Reemplazar caracteres problemáticos
            return text
                .replace(/[^\x00-\x7F]/g, '?') // Reemplazar caracteres no ASCII con ?
                .replace(/\r\n/g, '\n') // Normalizar saltos de línea
                .replace(/\r/g, '\n') // Normalizar saltos de línea
                .replace(/\t/g, '    ') // Reemplazar tabs con espacios
                .replace(/[^\x20-\x7E\n]/g, '') // Mantener solo caracteres imprimibles ASCII y saltos de línea
                .trim();
        }
        
        function wrapText(text, maxWidth, fontSize) {
            // Dividir por saltos de línea primero
            const paragraphs = text.split('\n');
            const lines = [];
            
            for (const paragraph of paragraphs) {
                if (paragraph.trim() === '') {
                    lines.push(''); // Línea vacía
                    continue;
                }
                
                const words = paragraph.split(' ');
                let currentLine = '';
                
                for (const word of words) {
                    const testLine = currentLine + (currentLine ? ' ' : '') + word;
                    const testWidth = testLine.length * (fontSize * 0.6); // Aproximación del ancho
                    
                    if (testWidth > maxWidth && currentLine) {
                        lines.push(currentLine);
                        currentLine = word;
                    } else {
                        currentLine = testLine;
                    }
                }
                
                if (currentLine) {
                    lines.push(currentLine);
                }
            }
            
            return lines;
        }
        
        function downloadPDF() {
            if (!pdfBlob) return;
            
            const url = URL.createObjectURL(pdfBlob);
            const a = document.createElement('a');
            a.href = url;
            a.download = selectedFile.name.replace(/\.[^/.]+$/, '') + '.pdf';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            console.log('📥 PDF descargado');
        }
        
        function showStatus(message, type) {
            status.textContent = message;
            status.className = `status ${type}`;
            status.style.display = 'block';
        }
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        console.log('✅ Conversor inicializado correctamente');
    </script>
</body>
</html>
