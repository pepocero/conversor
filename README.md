# 🔄 Conversor Universal

Una herramienta web completa para convertir documentos de texto a PDF con múltiples opciones de calidad y formato.

## 🚀 Características

- **Convertidor Básico**: Conversión rápida de texto a PDF con formato básico
- **Convertidor Avanzado**: Conversión de alta calidad que mantiene formato completo e imágenes
- **Soporte múltiple**: TXT, DOCX, RTF
- **Procesamiento local**: Todo se procesa en tu navegador, sin subir archivos a servidores
- **Interfaz responsive**: Funciona perfectamente en móviles y escritorio
- **Gratuito**: Sin límites ni costos

## 📁 Estructura del Proyecto

```
conversor/
├── index.html                    # Página principal
├── text-to-pdf.html             # Convertidor básico
├── text-to-pdf-advanced.html    # Convertidor avanzado
├── pdf-to-word.html             # Placeholder para futuro convertidor
├── ejemplo.txt                 # Archivo de ejemplo
├── ejemplo_simple.txt          # Archivo de ejemplo simple
└── README.md                   # Este archivo
```

## 🛠️ Tecnologías Utilizadas

### Convertidor Básico
- **PDF-lib**: Generación de PDFs básicos
- **mammoth.js**: Extracción de texto de archivos DOCX
- **FileSaver.js**: Descarga de archivos

### Convertidor Avanzado
- **mammoth.js**: Extracción de HTML completo de DOCX
- **html2canvas**: Conversión de HTML a imagen
- **jsPDF**: Generación de PDFs de alta calidad

## 🎯 Cómo Usar

### Opción 1: Convertidor Básico
1. Abre `text-to-pdf.html` en tu navegador
2. Selecciona o arrastra tu archivo (TXT, DOCX, RTF)
3. Haz clic en "Convertir a PDF"
4. Descarga el PDF generado

### Opción 2: Convertidor Avanzado
1. Abre `text-to-pdf-advanced.html` en tu navegador
2. Selecciona o arrastra tu archivo (TXT, DOCX, RTF)
3. Revisa la vista previa del contenido
4. Haz clic en "Convertir a PDF Avanzado"
5. Descarga el PDF de alta calidad

## 📋 Formatos Soportados

| Formato | Básico | Avanzado | Notas |
|---------|--------|----------|-------|
| TXT     | ✅     | ✅       | Texto plano |
| DOCX    | ✅     | ✅       | Texto + formato básico |
| RTF     | ✅     | ✅       | Texto + formato básico |

### Limitaciones
- **Imágenes**: Solo el convertidor avanzado puede mostrar imágenes
- **Formato complejo**: El convertidor básico convierte formato a marcadores de texto
- **Tamaño**: Máximo 10MB por archivo

## 🚀 Instalación y Uso Local

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/pepocero/conversor.git
   cd conversor
   ```

2. **Abre en tu navegador**:
   - Opción 1: Abre `index.html` directamente
   - Opción 2: Usa un servidor local (XAMPP, Live Server, etc.)

3. **Usa los convertidores**:
   - Desde la página principal selecciona "Básico" o "Avanzado"
   - O abre directamente `text-to-pdf.html` o `text-to-pdf-advanced.html`

## 🔧 Desarrollo

### Estructura de Archivos
- `index.html`: Página principal con navegación
- `text-to-pdf.html`: Convertidor básico con PDF-lib
- `text-to-pdf-advanced.html`: Convertidor avanzado con html2canvas + jsPDF
- `pdf-to-word.html`: Placeholder para futuro desarrollo

### Características Técnicas
- **Sin backend**: Todo el procesamiento es cliente-side
- **CDN**: Librerías cargadas desde CDN para mejor rendimiento
- **Responsive**: CSS Grid y Flexbox para diseño adaptable
- **Progressive Enhancement**: Funciona sin JavaScript para funciones básicas

## 📝 Changelog

### v1.0.0 (2024)
- ✅ Convertidor básico de texto a PDF
- ✅ Soporte para TXT, DOCX, RTF
- ✅ Interfaz responsive
- ✅ Procesamiento local

### v1.1.0 (2024)
- ✅ Convertidor avanzado con formato completo
- ✅ Soporte para imágenes en DOCX
- ✅ Vista previa del contenido
- ✅ Mejor calidad de PDF

## 🤝 Contribuciones

Las contribuciones son bienvenidas! Por favor:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver `LICENSE` para más detalles.

## 🆘 Soporte

Si tienes problemas o preguntas:

1. Revisa los [Issues existentes](https://github.com/pepocero/conversor/issues)
2. Crea un nuevo issue si no encuentras solución
3. Incluye detalles del navegador y archivos de prueba

## 🎉 Agradecimientos

- [mammoth.js](https://github.com/mwilliamson/mammoth.js) - Extracción de contenido DOCX
- [PDF-lib](https://github.com/Hopding/pdf-lib) - Generación de PDFs
- [html2canvas](https://github.com/niklasvh/html2canvas) - HTML a imagen
- [jsPDF](https://github.com/parallax/jsPDF) - Generación de PDFs avanzados

---

**Desarrollado con ❤️ por [pepocero](https://github.com/pepocero)**