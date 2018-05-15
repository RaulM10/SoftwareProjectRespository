/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.softwareprojectdesktopapplication;
import java.awt.Color;
import java.sql.*;
import java.util.Arrays;
/**
 *
 * @author b42079
 */
public class ForgotPasswordFrame extends javax.swing.JFrame {

    /**
     * Creates new form ForgotPasswordFrame
     */
    public ForgotPasswordFrame() {
        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        ForgotPasswordTitle = new javax.swing.JLabel();
        FrgtPassEmailField = new javax.swing.JTextField();
        FrgtPassPass1Field = new javax.swing.JPasswordField();
        FrgtPassPass2Field = new javax.swing.JPasswordField();
        FrgtPassEmail = new javax.swing.JLabel();
        FrgtPassPass1 = new javax.swing.JLabel();
        FrgtPassPass2 = new javax.swing.JLabel();
        FrgtPassBtn = new javax.swing.JButton();
        FrgtPassErrorField = new javax.swing.JLabel();
        FrgtPassEmailErrorField = new javax.swing.JLabel();
        jMenuBar1 = new javax.swing.JMenuBar();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Forgot Password");

        ForgotPasswordTitle.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        ForgotPasswordTitle.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        ForgotPasswordTitle.setText("Forgot Password");

        FrgtPassEmailField.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N

        FrgtPassPass1Field.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        FrgtPassPass1Field.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                FrgtPassPass1FieldActionPerformed(evt);
            }
        });

        FrgtPassPass2Field.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N

        FrgtPassEmail.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        FrgtPassEmail.setText("Email: ");

        FrgtPassPass1.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        FrgtPassPass1.setText("Password: ");

        FrgtPassPass2.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        FrgtPassPass2.setText("Confirm Password: ");

        FrgtPassBtn.setText("Update Password");
        FrgtPassBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                FrgtPassBtnActionPerformed(evt);
            }
        });

        FrgtPassErrorField.setForeground(new java.awt.Color(255, 0, 0));
        FrgtPassErrorField.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);

        FrgtPassEmailErrorField.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        FrgtPassEmailErrorField.setForeground(new java.awt.Color(255, 0, 0));
        setJMenuBar(jMenuBar1);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(23, 23, 23)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(FrgtPassEmail, javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(FrgtPassPass1, javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(FrgtPassPass2, javax.swing.GroupLayout.Alignment.TRAILING))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(FrgtPassEmailField)
                            .addComponent(FrgtPassPass1Field)
                            .addComponent(FrgtPassPass2Field, javax.swing.GroupLayout.PREFERRED_SIZE, 129, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(FrgtPassEmailErrorField, javax.swing.GroupLayout.DEFAULT_SIZE, 149, Short.MAX_VALUE))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(93, 93, 93)
                                .addComponent(FrgtPassBtn))
                            .addGroup(layout.createSequentialGroup()
                                .addGap(79, 79, 79)
                                .addComponent(ForgotPasswordTitle, javax.swing.GroupLayout.PREFERRED_SIZE, 186, javax.swing.GroupLayout.PREFERRED_SIZE)))
                        .addGap(0, 0, Short.MAX_VALUE)))
                .addContainerGap())
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(0, 0, Short.MAX_VALUE)
                .addComponent(FrgtPassErrorField, javax.swing.GroupLayout.PREFERRED_SIZE, 364, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(50, 50, 50))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(ForgotPasswordTitle, javax.swing.GroupLayout.PREFERRED_SIZE, 23, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(36, 36, 36)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(FrgtPassEmailField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(FrgtPassEmail)
                    .addComponent(FrgtPassEmailErrorField, javax.swing.GroupLayout.PREFERRED_SIZE, 21, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(FrgtPassPass1Field, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(FrgtPassPass1))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(FrgtPassPass2Field, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(FrgtPassPass2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(FrgtPassErrorField, javax.swing.GroupLayout.PREFERRED_SIZE, 24, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(FrgtPassBtn)
                .addContainerGap(65, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void FrgtPassPass1FieldActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_FrgtPassPass1FieldActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_FrgtPassPass1FieldActionPerformed

    private void FrgtPassBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_FrgtPassBtnActionPerformed
        // TODO add your handling code here:
        FrgtPassErrorField.setForeground(Color.red);
        int AccountIdChosen = 0;
        Boolean EmailBool = false, Password1Bool = false, Password2Bool = false, AccountIdBool = false;
        String Email = FrgtPassEmailField.getText();
        char[] Password1 = FrgtPassPass1Field.getPassword();
        char[] Password2 = FrgtPassPass2Field.getPassword();
        String Pass1 = "", Pass2 = "";
        for(char PasswordChar : Password1){
            Pass1+=PasswordChar;
        }
        for(char PasswordChar : Password2){
            Pass2+=PasswordChar;
        }
        
        //Email Validation
        if(Email.matches("")){
            FrgtPassErrorField.setText("All Fields must be Filled and Numbers are not Accepted!");
        }
        else{
            if(Email.contains("@")){
                EmailBool = true;
            }
            else{
                FrgtPassEmailErrorField.setText("'@' Notation Missing!");  
            }
        }
        
        //Password 1 Validation
        if(Password1.equals("")){
            FrgtPassErrorField.setText("All Fields must be Filled and Numbers are not Accepted!");
        }
        else{
            Password1Bool = true;
        }
        
        //Password 2 Validation
        if(Password2.equals("")){
            FrgtPassErrorField.setText("All Fields must be Filled and Numbers are not Accepted!");
        }
        else{
            Password2Bool  = true;
        }
        
        if(EmailBool && Password1Bool && Password2Bool){
            if(Arrays.equals(Password1, Password2)){
                try {      
                    Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/sdprojectdb", "root", "");
                    PreparedStatement stmt = con.prepareStatement("SELECT * FROM manager WHERE Email_Address = ?");
                    stmt.setString(1, Email);
                    ResultSet RowsSelected = stmt.executeQuery();
                    while (RowsSelected.next()) {
                        AccountIdChosen = RowsSelected.getInt(6);
                        AccountIdBool = true;
                    }
                    if(AccountIdBool){
                        FrgtPassErrorField.setText("Email not Valid!");
                    }
                    else{}
                    con.close();
                } catch (SQLException e) {
                    System.out.println("Query Failed");
                }
                
                try {      
                    Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/sdprojectdb", "root", "");
                    PreparedStatement stmt = con.prepareStatement("UPDATE account SET Password = ? WHERE Account_Id = ?");
                    stmt.setString(1, Pass1);
                    stmt.setInt(2, AccountIdChosen);
                    int RowsSelected = stmt.executeUpdate();
                    if(RowsSelected > 0) {
                        FrgtPassErrorField.setForeground(Color.green);
                        FrgtPassErrorField.setText("Password Updated");
                        FrgtPassEmailField.setText("");
                        FrgtPassPass1Field.setText("");
                        FrgtPassPass2Field.setText("");
                    }
                    else{
                        FrgtPassErrorField.setForeground(Color.red);
                        FrgtPassErrorField.setText("Password Not Updated!");
                    }
                    con.close();
                } catch (SQLException e) {
                    System.out.println("Query Failed");
                }
                
                
            }
            else{
                FrgtPassErrorField.setText("Emails don't Match!");
            }
        }
        
        
        
        
        
        
    }//GEN-LAST:event_FrgtPassBtnActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(ForgotPasswordFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(ForgotPasswordFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(ForgotPasswordFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(ForgotPasswordFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new ForgotPasswordFrame().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel ForgotPasswordTitle;
    private javax.swing.JButton FrgtPassBtn;
    private javax.swing.JLabel FrgtPassEmail;
    private javax.swing.JLabel FrgtPassEmailErrorField;
    private javax.swing.JTextField FrgtPassEmailField;
    private javax.swing.JLabel FrgtPassErrorField;
    private javax.swing.JLabel FrgtPassPass1;
    private javax.swing.JPasswordField FrgtPassPass1Field;
    private javax.swing.JLabel FrgtPassPass2;
    private javax.swing.JPasswordField FrgtPassPass2Field;
    private javax.swing.JMenuBar jMenuBar1;
    // End of variables declaration//GEN-END:variables
}
