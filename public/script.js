let resultadoActual = '';
let erroresActuales = [];
let tablaActual = [];
let erroresActualesCsv = null;
let tokensActuales = [];
let tokensCsvActual = null;

function nuevoArchivo() {
    document.getElementById('codigo').value = '';
    limpiarConsola();
}

function cargarArchivo() {
    document.getElementById('fileInput').click();
}

document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const reader = new FileReader();
    
    reader.onload = function(e) {
        document.getElementById('codigo').value = e.target.result;
    };
    
    reader.readAsText(file);
});

function guardarArchivo() {
    const contenido = document.getElementById('codigo').value;
    const blob = new Blob([contenido], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'programa.go';
    a.click();
}

function ejecutar() {
    const codigo = document.getElementById('codigo').value;
    const consola = document.getElementById('consola');
    consola.innerHTML = '<div style="padding:15px; background:#1e1e2e; color:#cdd6f4; border-radius:8px;">⏳ Compilando...</div>';
    
    fetch('api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ codigo: codigo })
    })
    .then(response => response.json())
    .then(data => {
        let html = '';
        
        // Mostrar estado de compilación
        if (data.success) {
            html += '<div style="padding:10px; background:#40a02b; color:white; border-radius:8px; margin-bottom:15px; font-weight:bold;">✅ Compilación exitosa</div>';
        } else {
            html += '<div style="padding:10px; background:#d20f39; color:white; border-radius:8px; margin-bottom:15px; font-weight:bold;">❌ Compilación fallida</div>';
        }
        
        // Mostrar código ARM64 generado
        if (data.assembly || data.salida) {
            const assembly = data.assembly || data.salida || '';
            html += '<div style="margin-top:15px;">';
            html += '<strong style="font-size:16px; color:#89b4fa;">📟 Código ARM64 Generado</strong>';
            html += '<div style="margin-top:8px; font-size:12px; color:#bac2de;">(' + assembly.split('\n').length + ' líneas)</div>';
            html += '<textarea id="asmOutput" readonly style="width:100%; height:500px; background:#1e1e2e; color:#a6e3a1; font-family:\'Courier New\', monospace; font-size:11px; padding:12px; border:2px solid #45475a; border-radius:8px; resize:vertical; line-height:1.4;">' + escapeHtml(assembly) + '</textarea>';
            html += '<div style="margin-top:8px;">';
            html += '<button onclick="copiarAsambly()" style="padding:8px 15px; background:#45475a; color:#cdd6f4; border:none; border-radius:6px; cursor:pointer; font-weight:bold; margin-right:8px;">📋 Copiar Código</button>';
            html += '<button onclick="descargarAsambly()" style="padding:8px 15px; background:#45475a; color:#cdd6f4; border:none; border-radius:6px; cursor:pointer; font-weight:bold;">💾 Descargar .s</button>';
            html += '</div>';
            html += '</div>';
        }
        
        resultadoActual = data.assembly || data.salida || '';
        
        // Mostrar errores si existen
        const errores = [...(data.syntax || []), ...(data.semantic || [])];
        if (errores.length > 0) {
            html += '<div style="margin-top:15px;">';
            html += '<strong style="font-size:16px; color:#f38ba8;">⚠️ Errores detectados (' + errores.length + ')</strong>';
            html += '<div style="margin-top:8px;">';
            errores.forEach(err => {
                const msg = err.message || err.msg || 'Error desconocido';
                const line = err.line || err.col || 'N/A';
                const tipo = err.message ? 'Sintáctico' : 'Semántico';
                html += `<div style="padding:10px; background:#31324a; border-left:4px solid #f38ba8; margin-bottom:8px; border-radius:4px; color:#f38ba8;">
                    <strong>[${tipo}]</strong> Línea ${line}: ${msg}
                </div>`;
            });
            html += '</div>';
            html += '</div>';
        }
        
        // Mostrar tabla de símbolos si hay
        if (data.tabla && data.tabla.length > 0) {
            html += '<div style="margin-top:15px;">';
            html += '<strong style="font-size:16px; color:#cba6f7;">📋 Tabla de Símbolos (' + data.tabla.length + ' símbolos)</strong>';
            html += '<div style="margin-top:8px; overflow-x:auto;">';
            html += '<table style="width:100%; border-collapse:collapse; background:#1e1e2e; color:#cdd6f4;">';
            html += '<tr style="background:#45475a; font-weight:bold;"><th style="padding:10px; border:1px solid #585b70; text-align:left;">ID</th><th style="padding:10px; border:1px solid #585b70; text-align:left;">Tipo</th><th style="padding:10px; border:1px solid #585b70; text-align:left;">Valor</th><th style="padding:10px; border:1px solid #585b70; text-align:left;">Ámbito</th></tr>';
            data.tabla.forEach((sym, idx) => {
                html += `<tr style="border-bottom:1px solid #585b70;"><td style="padding:8px; border:1px solid #585b70;">${sym.identifier || ''}</td><td style="padding:8px; border:1px solid #585b70;"><span style="color:#89b4fa;">${sym.type || ''}</span></td><td style="padding:8px; border:1px solid #585b70;">${sym.value || ''}</td><td style="padding:8px; border:1px solid #585b70;">${sym.scope || ''}</td></tr>`;
            });
            html += '</table>';
            html += '</div>';
            html += '</div>';
        }
        
        consola.innerHTML = html;
        tablaActual = data.tabla || [];
        erroresActuales = errores;
        erroresActualesCsv = data.errors_csv || null;
        tokensActuales = data.tokens || [];
        tokensCsvActual = data.tokens_csv || null;
    })
    .catch(error => {
        consola.innerHTML = `<div style="padding:15px; background:#d20f39; color:white; border-radius:8px;">❌ Error de conexión: ${error.message}</div>`;
    });
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function limpiarConsola() {
    document.getElementById('consola').innerHTML = '';
}

function descargarResultado() {
    if (!resultadoActual) return;
    
    const blob = new Blob([resultadoActual], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'resultado.txt';
    a.click();
}

function copiarAsambly() {
    const txt = document.getElementById('asmOutput');
    if (!txt) return alert('No hay código para copiar');
    txt.select();
    document.execCommand('copy');
    alert('✅ Código copiado al portapapeles');
}

function descargarAsambly() {
    if (!resultadoActual) return alert('No hay código para descargar');
    
    const blob = new Blob([resultadoActual], { type: 'text/x-asm' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'output.s';
    a.click();
}

function descargarErrores() {
    if (!erroresActuales || erroresActuales.length === 0) return alert('No hay errores para descargar');

    // Si el backend proporcionó CSV, ofrecerlo directamente
    if (erroresActualesCsv) {
        const blob = new Blob([erroresActualesCsv], { type: 'text/csv' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'errores.csv';
        a.click();
        return;
    }

    // Fallback: texto legible si no hay CSV
    let contenido = '# Errores detectados\n';
    erroresActuales.forEach((err, i) => {
        let tipo = '';
        let msg = '';
        let line = '';
        let col = '';
        if (err.message !== undefined) {
            tipo = 'Sintáctico';
            msg = err.message;
            line = err.line ?? '';
            col = err.column ?? '';
            if (err.offending) msg += ` (offending: ${err.offending})`;
        } else if (err.msg !== undefined) {
            tipo = err.type || 'Semántico';
            msg = err.msg;
            line = err.line ?? '';
            col = err.col ?? '';
        } else {
            tipo = 'Error';
            msg = JSON.stringify(err);
        }
        contenido += `${i+1}\t${tipo}\t${msg}\t${line}\t${col}\n`;
    });

    const blob = new Blob([contenido], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'errores.txt';
    a.click();
}

function descargarTabla() {
    if (!tablaActual || tablaActual.length === 0) return alert('No hay tabla de símbolos disponible');

    // Generar CSV: Identifier,Type,Value,IsConst,Scope,Line,Column
    const headers = ['Identifier','Type','Value','IsConst','Scope','Line','Column'];
    let rows = [headers.join(',')];

    tablaActual.forEach(row => {
        const values = [
            (row.identifier ?? '').toString().replace(/\"/g, '"'),
            (row.type ?? '').toString(),
            (row.value ?? '').toString().replace(/\"/g, '"'),
            (row.isConst ? 'true' : 'false'),
            (row.scope ?? ''),
            (row.line ?? ''),
            (row.column ?? '')
        ];
        // Escape double quotes and wrap fields containing commas
        const esc = values.map(v => {
            const s = v.toString();
            if (s.indexOf(',') >= 0 || s.indexOf('"') >= 0 || s.indexOf('\n') >= 0) {
                return '"' + s.replace(/"/g, '""') + '"';
            }
            return s;
        });
        rows.push(esc.join(','));
    });

    const csv = rows.join('\n');
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'tabla_simbolos.csv';
    a.click();
}

function descargarTokens() {
    if (!tokensActuales || tokensActuales.length === 0) return alert('No hay tokens para descargar');
    if (tokensCsvActual) {
        const blob = new Blob([tokensCsvActual], { type: 'text/csv' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'tokens.csv';
        a.click();
        return;
    }

    // Fallback: build CSV
    const headers = ['Index','Text','Type','Line','Pos'];
    let rows = [headers.join(',')];
    tokensActuales.forEach(t => {
        const vals = [t.index, t.text, t.type, t.line, t.pos];
        const esc = vals.map(v => {
            const s = (v===null||v===undefined)?'':v.toString();
            if (s.indexOf(',') >= 0 || s.indexOf('"') >= 0 || s.indexOf('\n') >= 0) {
                return '"'+s.replace(/"/g,'""')+'"';
            }
            return s;
        });
        rows.push(esc.join(','));
    });
    const csv = rows.join('\n');
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'tokens.csv';
    a.click();
}