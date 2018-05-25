/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.softwareprojectdesktopapplication;
import java.sql.*;
import javax.swing.*;
/**
 *
 * @author b42079
 */
public class AllProducts extends javax.swing.JFrame {
    public double Price1 = 0.0, Price2 = 0.0, Price3 = 0.0, Price4 = 0.0, Price5 = 0.0, Price6 = 0.0, Price7 = 0.0, Price8 = 0.0, Price9 = 0.0, Price10 = 0.0;
    public double Price11 = 0.0, Price12 = 0.0, Price13 = 0.0, Price14 = 0.0, Price15 = 0.0, Price16 = 0.0, Price17 = 0.0, Price18 = 0.0, Price19 = 0.0, Price20 = 0.0;
    public double Price21 = 0.0, Price22 = 0.0, Price23 = 0.0, Price24 = 0.0, Price25 = 0.0, Price26 = 0.0, Price27 = 0.0, Price28 = 0.0, Price29 = 0.0, Price30 = 0.0;
    public double Price31 = 0.0, Price32 = 0.0, Price33 = 0.0, Price34 = 0.0, Price35 = 0.0, Price36 = 0.0, Price37 = 0.0, Price38 = 0.0, Price39 = 0.0, Price40 = 0.0, Price41 = 0.0, Price42 = 0.0, Price43 = 0.0, Price44 = 0.0, Price45 = 0.0;
    
    /**
     * Creates new form JuveTeam
     */
    public AllProducts() {
        initComponents();
        Price1 = GetAndSet(JuveHomeShirtPrice, 1, Price1);
        Price2 = GetAndSet(JuveHomeShortsPrice, 2, Price2);
        Price3 = GetAndSet(JuveHomeSocksPrice, 3, Price3);
        Price4 = GetAndSet(JuveAwayShirtPrice, 4, Price4);
        Price5 = GetAndSet(JuveAwayShortsPrice, 5, Price5);
        Price6 = GetAndSet(JuveAwaySocksPrice, 6, Price6);
        Price7 = GetAndSet(Juve3ShirtPrice, 7, Price7);
        Price8 = GetAndSet(Juve3ShortsPrice, 8, Price8);
        Price9 = GetAndSet(Juve3SocksPrice, 9, Price9);
        Price10 = GetAndSet(BayernHomeShirtPrice, 10, Price10);
        Price11 = GetAndSet(BayernHomeShortsPrice, 11, Price11);
        Price12 = GetAndSet(BayernHomeSocksPrice, 12, Price12);
        Price13 = GetAndSet(BayernAwayShirtPrice, 13, Price13);
        Price14 = GetAndSet(BayernAwayShortsPrice, 14, Price14);
        Price15 = GetAndSet(BayernAwaySocksPrice, 15, Price15);
        Price16 = GetAndSet(Bayern3ShirtPrice, 16, Price16);
        Price17 = GetAndSet(Bayern3ShortsPrice, 17, Price17);
        Price18 = GetAndSet(Bayern3SocksPrice, 18, Price18);
        Price19 = GetAndSet(PSGHomeShirtPrice, 19, Price19);
        Price20 = GetAndSet(PSGHomeShortsPrice, 20, Price20);
        Price21 = GetAndSet(PSGHomeSocksPrice, 21, Price21);
        Price22 = GetAndSet(PSGAwayShirtPrice, 22, Price22);
        Price23 = GetAndSet(PSGAwayShortsPrice, 23, Price23);
        Price24 = GetAndSet(PSGAwaySocksPrice, 24, Price24);
        Price25 = GetAndSet(PSG3ShirtPrice, 25, Price25);
        Price26 = GetAndSet(PSG3ShortsPrice, 26, Price26);
        Price27 = GetAndSet(PSG3SocksPrice, 27, Price27);
        Price28 = GetAndSet(ManCHomeShirtPrice, 28, Price28);
        Price29 = GetAndSet(ManCHomeShortsPrice, 29, Price29);
        Price30 = GetAndSet(ManCHomeSocksPrice, 30, Price30);
        Price31 = GetAndSet(ManCAwayShirtPrice, 31, Price31);
        Price32 = GetAndSet(ManCAwayShortsPrice, 32, Price32);
        Price33 = GetAndSet(ManCAwaySocksPrice, 33, Price33);
        Price34 = GetAndSet(ManC3ShirtPrice, 34, Price34);
        Price35 = GetAndSet(ManC3ShortsPrice, 35, Price35);
        Price36 = GetAndSet(ManC3SocksPrice, 36, Price36);
        Price37 = GetAndSet(RealHomeShirtPrice, 37, Price37);
        Price38 = GetAndSet(RealHomeShortsPrice, 38, Price38);
        Price39 = GetAndSet(RealHomeSocksPrice, 39, Price39);
        Price40 = GetAndSet(RealAwayShirtPrice, 40, Price40);
        Price41 = GetAndSet(RealAwayShortsPrice, 41, Price41);
        Price42 = GetAndSet(RealAwaySocksPrice, 42, Price42);
        Price43 = GetAndSet(Real3ShirtPrice, 43, Price43);
        Price44 = GetAndSet(Real3ShortsPrice, 44, Price44);
        Price45 = GetAndSet(Real3SocksPrice, 45, Price45);
    }

    private double GetAndSet(JSpinner InputFieldName, int ProductId, double ActualPrice){
        try { 
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/sdprojectdb", "root", "");
            PreparedStatement stmt = con.prepareStatement("SELECT * FROM product WHERE Product_Id = ?");
            stmt.setInt(1, ProductId);
            ResultSet RowsSelected = stmt.executeQuery();
            while (RowsSelected.next()) {
                ActualPrice = RowsSelected.getDouble(2);
                InputFieldName.setValue(ActualPrice);
            }
            con.close();
        } catch (Exception e) {
            System.out.println("Query Failed");
        }
        return ActualPrice;
    }
    
    
    private void ComparePrices(double BeforePrice, int ProductId, JSpinner FieldName){
      String StringValue = FieldName.getValue().toString();
      double NewPrice = Double.parseDouble(StringValue);
      if(BeforePrice == NewPrice){}
      else{
        try { 
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/sdprojectdb", "root", "");
            PreparedStatement stmt = con.prepareStatement("UPDATE product SET Price = ?, OldPrice = ? WHERE Product_Id = ?");
            stmt.setDouble(1, NewPrice);
            stmt.setDouble(2, BeforePrice);
            stmt.setInt(3, ProductId);
            int RowsSelected = stmt.executeUpdate();
            if(RowsSelected > 0){
                InformationField.setText("Changes were Saved and Updates were made accordingly to your Needs!");
            }
            con.close();
        } catch (Exception e) {
            System.out.println("Query Failed");
        }
        
        
       }
    
    
    
    
    
    }
    
    
    
    
    
    
    
    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        SubmitChangesButton = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();
        JuveHomeShirtPrice = new javax.swing.JSpinner();
        JuveAwayShirtPrice = new javax.swing.JSpinner();
        JuveAwaySocksPrice = new javax.swing.JSpinner();
        JuveHomeSocksPrice = new javax.swing.JSpinner();
        JuveAwayShortsPrice = new javax.swing.JSpinner();
        JuveHomeShortsPrice = new javax.swing.JSpinner();
        Juve3ShortsPrice = new javax.swing.JSpinner();
        Juve3SocksPrice = new javax.swing.JSpinner();
        Juve3ShirtPrice = new javax.swing.JSpinner();
        JuveHomeShirtLbl = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        jLabel8 = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        jLabel10 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        jLabel13 = new javax.swing.JLabel();
        jLabel14 = new javax.swing.JLabel();
        Bayern3SocksPrice = new javax.swing.JSpinner();
        jLabel15 = new javax.swing.JLabel();
        jLabel16 = new javax.swing.JLabel();
        Bayern3ShirtPrice = new javax.swing.JSpinner();
        jLabel2 = new javax.swing.JLabel();
        BayernHomeShirtPrice = new javax.swing.JSpinner();
        BayernAwayShirtPrice = new javax.swing.JSpinner();
        BayernAwaySocksPrice = new javax.swing.JSpinner();
        jLabel17 = new javax.swing.JLabel();
        jLabel18 = new javax.swing.JLabel();
        jLabel19 = new javax.swing.JLabel();
        jLabel20 = new javax.swing.JLabel();
        jLabel21 = new javax.swing.JLabel();
        jLabel22 = new javax.swing.JLabel();
        BayernHomeSocksPrice = new javax.swing.JSpinner();
        jLabel23 = new javax.swing.JLabel();
        BayernAwayShortsPrice = new javax.swing.JSpinner();
        BayernHomeShortsPrice = new javax.swing.JSpinner();
        Bayern3ShortsPrice = new javax.swing.JSpinner();
        PSGHomeSocksPrice = new javax.swing.JSpinner();
        jLabel3 = new javax.swing.JLabel();
        jLabel24 = new javax.swing.JLabel();
        jLabel25 = new javax.swing.JLabel();
        PSG3SocksPrice = new javax.swing.JSpinner();
        PSGAwayShirtPrice = new javax.swing.JSpinner();
        PSGAwayShortsPrice = new javax.swing.JSpinner();
        jLabel26 = new javax.swing.JLabel();
        PSG3ShortsPrice = new javax.swing.JSpinner();
        jLabel27 = new javax.swing.JLabel();
        PSGAwaySocksPrice = new javax.swing.JSpinner();
        PSGHomeShortsPrice = new javax.swing.JSpinner();
        jLabel28 = new javax.swing.JLabel();
        jLabel29 = new javax.swing.JLabel();
        jLabel30 = new javax.swing.JLabel();
        PSGHomeShirtPrice = new javax.swing.JSpinner();
        PSG3ShirtPrice = new javax.swing.JSpinner();
        jLabel31 = new javax.swing.JLabel();
        jLabel32 = new javax.swing.JLabel();
        jLabel33 = new javax.swing.JLabel();
        ManCHomeShirtPrice = new javax.swing.JSpinner();
        jLabel34 = new javax.swing.JLabel();
        jLabel35 = new javax.swing.JLabel();
        jLabel36 = new javax.swing.JLabel();
        jLabel37 = new javax.swing.JLabel();
        ManC3SocksPrice = new javax.swing.JSpinner();
        ManC3ShirtPrice = new javax.swing.JSpinner();
        ManCAwayShirtPrice = new javax.swing.JSpinner();
        ManCHomeShortsPrice = new javax.swing.JSpinner();
        jLabel38 = new javax.swing.JLabel();
        jLabel39 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        ManCAwayShortsPrice = new javax.swing.JSpinner();
        ManC3ShortsPrice = new javax.swing.JSpinner();
        ManCHomeSocksPrice = new javax.swing.JSpinner();
        jLabel40 = new javax.swing.JLabel();
        jLabel41 = new javax.swing.JLabel();
        ManCAwaySocksPrice = new javax.swing.JSpinner();
        jLabel42 = new javax.swing.JLabel();
        RealHomeShirtPrice = new javax.swing.JSpinner();
        jLabel43 = new javax.swing.JLabel();
        jLabel44 = new javax.swing.JLabel();
        jLabel45 = new javax.swing.JLabel();
        jLabel46 = new javax.swing.JLabel();
        Real3SocksPrice = new javax.swing.JSpinner();
        Real3ShirtPrice = new javax.swing.JSpinner();
        RealAwayShirtPrice = new javax.swing.JSpinner();
        RealHomeShortsPrice = new javax.swing.JSpinner();
        jLabel47 = new javax.swing.JLabel();
        jLabel48 = new javax.swing.JLabel();
        jLabel49 = new javax.swing.JLabel();
        RealAwayShortsPrice = new javax.swing.JSpinner();
        Real3ShortsPrice = new javax.swing.JSpinner();
        RealHomeSocksPrice = new javax.swing.JSpinner();
        jLabel50 = new javax.swing.JLabel();
        jLabel51 = new javax.swing.JLabel();
        RealAwaySocksPrice = new javax.swing.JSpinner();
        jLabel5 = new javax.swing.JLabel();
        InformationField = new javax.swing.JLabel();
        jMenuBar1 = new javax.swing.JMenuBar();
        jMenu1 = new javax.swing.JMenu();
        HelpMenuItem = new javax.swing.JMenuItem();
        SearchMenuItem = new javax.swing.JMenuItem();
        Query = new javax.swing.JMenuItem();
        jMenu2 = new javax.swing.JMenu();
        LogOutMenuItem = new javax.swing.JMenuItem();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Products");
        setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        SubmitChangesButton.setText("Submit Changes");
        SubmitChangesButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                SubmitChangesButtonActionPerformed(evt);
            }
        });

        jLabel1.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("Juventus");

        JuveHomeShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        JuveHomeShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        JuveHomeShirtPrice.setMinimumSize(null);
        JuveHomeShirtPrice.setName(""); // NOI18N

        JuveAwayShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        JuveAwayShirtPrice.setMinimumSize(null);
        JuveAwayShirtPrice.setName(""); // NOI18N

        JuveAwaySocksPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        JuveAwaySocksPrice.setMinimumSize(null);
        JuveAwaySocksPrice.setName(""); // NOI18N

        JuveHomeSocksPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        JuveHomeSocksPrice.setMinimumSize(null);
        JuveHomeSocksPrice.setName(""); // NOI18N

        JuveAwayShortsPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        JuveAwayShortsPrice.setMinimumSize(null);
        JuveAwayShortsPrice.setName(""); // NOI18N

        JuveHomeShortsPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        JuveHomeShortsPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        JuveHomeShortsPrice.setMinimumSize(null);
        JuveHomeShortsPrice.setName(""); // NOI18N

        Juve3ShortsPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        Juve3ShortsPrice.setMinimumSize(null);
        Juve3ShortsPrice.setName(""); // NOI18N

        Juve3SocksPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        Juve3SocksPrice.setMinimumSize(null);
        Juve3SocksPrice.setName(""); // NOI18N

        Juve3ShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        Juve3ShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        Juve3ShirtPrice.setMinimumSize(null);
        Juve3ShirtPrice.setName(""); // NOI18N

        JuveHomeShirtLbl.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        JuveHomeShirtLbl.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        JuveHomeShirtLbl.setText("Home Shirt: ");

        jLabel7.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel7.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel7.setText("Away Shorts: ");

        jLabel8.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel8.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel8.setText("Away Shirt: ");

        jLabel9.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel9.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel9.setText("Third Shirt: ");

        jLabel10.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel10.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel10.setText("Away Socks: ");

        jLabel11.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel11.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel11.setText("Third Socks:");

        jLabel12.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel12.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel12.setText("Third Shorts: ");

        jLabel13.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel13.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel13.setText("Home Shorts: ");

        jLabel14.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel14.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel14.setText("Home Socks: ");

        Bayern3SocksPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel15.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel15.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel15.setText("Home Shorts: ");

        jLabel16.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel16.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel16.setText("Home Socks: ");

        Bayern3ShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        Bayern3ShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        Bayern3ShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel2.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel2.setText("Bayern Munich");

        BayernHomeShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        BayernHomeShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        BayernHomeShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        BayernAwayShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        BayernAwaySocksPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel17.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel17.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel17.setText("Home Shirt: ");

        jLabel18.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel18.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel18.setText("Away Shorts: ");

        jLabel19.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel19.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel19.setText("Away Shirt: ");

        jLabel20.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel20.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel20.setText("Third Shirt: ");

        jLabel21.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel21.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel21.setText("Away Socks: ");

        jLabel22.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel22.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel22.setText("Third Socks:");

        BayernHomeSocksPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel23.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel23.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel23.setText("Third Shorts: ");

        BayernAwayShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        BayernHomeShortsPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        BayernHomeShortsPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        BayernHomeShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        Bayern3ShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        PSGHomeSocksPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel3.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel3.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel3.setText("Paris Saint Germain");

        jLabel24.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel24.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel24.setText("Home Shirt: ");

        jLabel25.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel25.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel25.setText("Away Socks: ");

        PSG3SocksPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        PSGAwayShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        PSGAwayShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel26.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel26.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel26.setText("Away Shorts: ");

        PSG3ShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel27.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel27.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel27.setText("Home Shorts: ");

        PSGAwaySocksPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        PSGHomeShortsPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        PSGHomeShortsPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        PSGHomeShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel28.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel28.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel28.setText("Home Socks: ");

        jLabel29.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel29.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel29.setText("Away Shirt: ");

        jLabel30.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel30.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel30.setText("Third Shorts: ");

        PSGHomeShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        PSGHomeShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        PSGHomeShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        PSG3ShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        PSG3ShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        PSG3ShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel31.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel31.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel31.setText("Third Socks:");

        jLabel32.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel32.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel32.setText("Third Shirt: ");

        jLabel33.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel33.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel33.setText("Third Socks:");

        ManCHomeShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        ManCHomeShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        ManCHomeShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel34.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel34.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel34.setText("Home Shirt: ");

        jLabel35.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel35.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel35.setText("Third Shorts: ");

        jLabel36.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel36.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel36.setText("Away Socks: ");

        jLabel37.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel37.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel37.setText("Away Shorts: ");

        ManC3ShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        ManC3ShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));

        ManCAwayShirtPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        ManCHomeShortsPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        ManCHomeShortsPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));
        ManCHomeShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel38.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel38.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel38.setText("Home Shorts: ");

        jLabel39.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel39.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel39.setText("Third Shirt: ");

        jLabel4.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel4.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel4.setText("Manchester City");

        ManCAwayShortsPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        ManCHomeSocksPrice.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));

        jLabel40.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel40.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel40.setText("Home Socks: ");

        jLabel41.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel41.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel41.setText("Away Shirt: ");

        jLabel42.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel42.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel42.setText("Third Socks:");

        RealHomeShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        RealHomeShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));

        jLabel43.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel43.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel43.setText("Home Shirt: ");

        jLabel44.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel44.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel44.setText("Third Shorts: ");

        jLabel45.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel45.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel45.setText("Away Socks: ");

        jLabel46.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel46.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel46.setText("Away Shorts: ");

        Real3ShirtPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        Real3ShirtPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));

        RealHomeShortsPrice.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        RealHomeShortsPrice.setModel(new javax.swing.SpinnerNumberModel(0.0d, null, null, 1.0d));

        jLabel47.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel47.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel47.setText("Home Shorts: ");

        jLabel48.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel48.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel48.setText("Third Shirt: ");

        jLabel49.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel49.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel49.setText("Real Madrid");

        jLabel50.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel50.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel50.setText("Home Socks: ");

        jLabel51.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel51.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        jLabel51.setText("Away Shirt: ");

        jLabel5.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        jLabel5.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel5.setText("Products Prices");

        InformationField.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        InformationField.setForeground(new java.awt.Color(0, 255, 0));
        InformationField.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);

        jMenu1.setText("File");

        HelpMenuItem.setText("Help");
        HelpMenuItem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                HelpMenuItemActionPerformed(evt);
            }
        });
        jMenu1.add(HelpMenuItem);

        SearchMenuItem.setText("Search");
        SearchMenuItem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                SearchMenuItemActionPerformed(evt);
            }
        });
        jMenu1.add(SearchMenuItem);

        Query.setText("Customer Queries");
        Query.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                QueryActionPerformed(evt);
            }
        });
        jMenu1.add(Query);

        jMenuBar1.add(jMenu1);

        jMenu2.setText("Operations");

        LogOutMenuItem.setText("Log Out");
        LogOutMenuItem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                LogOutMenuItemActionPerformed(evt);
            }
        });
        jMenu2.add(LogOutMenuItem);

        jMenuBar1.add(jMenu2);

        setJMenuBar(jMenuBar1);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addContainerGap()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jLabel11, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel12, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel7, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel14, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(JuveHomeShirtLbl, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel9, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel8, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jLabel13, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel10, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(JuveHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(JuveHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(JuveHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(JuveAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(JuveAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(JuveAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(1, 1, 1)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(Juve3ShirtPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(Juve3SocksPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(Juve3ShortsPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(66, 66, 66)
                        .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(40, 40, 40)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jLabel22, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel23, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel18, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel16, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(jLabel17, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel20, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel19, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jLabel15, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel21, javax.swing.GroupLayout.PREFERRED_SIZE, 108, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(BayernHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(BayernHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(BayernHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(BayernAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(BayernAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(BayernAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(1, 1, 1)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(Bayern3ShirtPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(Bayern3SocksPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(Bayern3ShortsPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(32, 32, 32)))
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(40, 40, 40)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jLabel31, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel30, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel26, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel28, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(jLabel32, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel29, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jLabel27, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel25, javax.swing.GroupLayout.PREFERRED_SIZE, 108, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(PSGHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(PSGHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(PSGAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(PSGAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(PSGAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(PSG3ShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(PSG3SocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(PSG3ShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(jLabel24, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(PSGHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(91, 91, 91)
                        .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(40, 40, 40)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jLabel33, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel35, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel37, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel40, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(jLabel34, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel39, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel41, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jLabel38, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel36, javax.swing.GroupLayout.PREFERRED_SIZE, 108, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(ManCHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(ManCHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(ManCHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(ManCAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(ManCAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(ManCAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(1, 1, 1)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(ManC3ShirtPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(ManC3SocksPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(ManC3ShortsPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(95, 95, 95)
                        .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 67, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jLabel42, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel44, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel46, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel50, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(jLabel43, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel48, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(jLabel51, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jLabel47, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel45, javax.swing.GroupLayout.PREFERRED_SIZE, 108, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(RealHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(RealHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(RealHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(RealAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(RealAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(RealAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(1, 1, 1)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(Real3ShirtPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(Real3SocksPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(Real3ShortsPrice, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))))
                        .addContainerGap())
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(jLabel49, javax.swing.GroupLayout.PREFERRED_SIZE, 119, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(38, 38, 38))))
            .addGroup(layout.createSequentialGroup()
                .addGap(356, 356, 356)
                .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, 478, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(18, 18, 18)
                .addComponent(InformationField, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(SubmitChangesButton, javax.swing.GroupLayout.PREFERRED_SIZE, 168, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(514, 514, 514))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, 28, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(JuveHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(JuveHomeShirtLbl))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(JuveHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel13))
                        .addGap(22, 22, 22)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(JuveHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel14))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(JuveAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel8))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(JuveAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel7))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(JuveAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel10))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel11)
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(Juve3ShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel9))
                                .addGap(18, 18, 18)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(Juve3ShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel12))
                                .addGap(18, 18, 18)
                                .addComponent(Juve3SocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(BayernHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel17))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(BayernHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel15))
                        .addGap(22, 22, 22)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(BayernHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel16))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(BayernAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel19))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(BayernAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel18))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(BayernAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel21))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel22)
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(Bayern3ShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel20))
                                .addGap(18, 18, 18)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(Bayern3ShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel23))
                                .addGap(18, 18, 18)
                                .addComponent(Bayern3SocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(PSGHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel24, javax.swing.GroupLayout.PREFERRED_SIZE, 18, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(PSGHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel27))
                        .addGap(22, 22, 22)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(PSGHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel28))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(PSGAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel29))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(PSGAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel26))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(PSGAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel25))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel31)
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(PSG3ShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel32))
                                .addGap(18, 18, 18)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(PSG3ShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel30))
                                .addGap(18, 18, 18)
                                .addComponent(PSG3SocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(ManCHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel34))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(ManCHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel38))
                        .addGap(22, 22, 22)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(ManCHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel40))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(ManCAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel41))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(ManCAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel37))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(ManCAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel36))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel33)
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(ManC3ShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel39))
                                .addGap(18, 18, 18)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(ManC3ShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel35))
                                .addGap(18, 18, 18)
                                .addComponent(ManC3SocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel49, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(RealHomeShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel43))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(RealHomeShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel47))
                        .addGap(22, 22, 22)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(RealHomeSocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel50))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(RealAwayShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel51))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(RealAwayShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel46))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(RealAwaySocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel45))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel42)
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(Real3ShirtPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel48))
                                .addGap(18, 18, 18)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(Real3ShortsPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel44))
                                .addGap(18, 18, 18)
                                .addComponent(Real3SocksPrice, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(InformationField, javax.swing.GroupLayout.PREFERRED_SIZE, 27, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(SubmitChangesButton)
                .addContainerGap())
        );

        jLabel7.getAccessibleContext().setAccessibleName("Juve Away Shorts: ");

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void SubmitChangesButtonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_SubmitChangesButtonActionPerformed
        // TODO add your handling code here:
        ComparePrices(Price1, 1, JuveHomeShirtPrice);
        ComparePrices(Price2, 2, JuveHomeShortsPrice);
        ComparePrices(Price3, 3, JuveHomeSocksPrice);
        ComparePrices(Price4, 4, JuveAwayShirtPrice);
        ComparePrices(Price5, 5, JuveAwayShortsPrice);
        ComparePrices(Price6, 6, JuveAwaySocksPrice);
        ComparePrices(Price7, 7, Juve3ShirtPrice);
        ComparePrices(Price8, 8, Juve3ShortsPrice);
        ComparePrices(Price9, 9, Juve3SocksPrice);
        ComparePrices(Price10, 10, BayernHomeShirtPrice);
        ComparePrices(Price11, 11, BayernHomeShortsPrice);
        ComparePrices(Price12, 12, BayernHomeSocksPrice);
        ComparePrices(Price13, 13, BayernAwayShirtPrice);
        ComparePrices(Price14, 14, BayernAwayShortsPrice);
        ComparePrices(Price15, 15, BayernAwaySocksPrice);
        ComparePrices(Price16, 16, Bayern3ShirtPrice);
        ComparePrices(Price17, 17, Bayern3ShortsPrice);
        ComparePrices(Price18, 18, Bayern3SocksPrice);
        ComparePrices(Price19, 19, PSGHomeShirtPrice);
        ComparePrices(Price20, 20, PSGHomeShortsPrice);
        ComparePrices(Price21, 21, PSGHomeSocksPrice);
        ComparePrices(Price22, 22, PSGAwayShirtPrice);
        ComparePrices(Price23, 23, PSGAwayShortsPrice);
        ComparePrices(Price24, 24, PSGAwaySocksPrice);
        ComparePrices(Price25, 25, PSG3ShirtPrice);
        ComparePrices(Price26, 26, PSG3ShortsPrice);
        ComparePrices(Price27, 27, PSG3SocksPrice);
        ComparePrices(Price28, 28, ManCHomeShirtPrice);
        ComparePrices(Price29, 29, ManCHomeShortsPrice);
        ComparePrices(Price30, 30, ManCHomeSocksPrice);
        ComparePrices(Price31, 31, ManCAwayShirtPrice);
        ComparePrices(Price32, 32, ManCAwayShortsPrice);
        ComparePrices(Price33, 33, ManCAwaySocksPrice);
        ComparePrices(Price34, 34, ManC3ShirtPrice);
        ComparePrices(Price35, 35, ManC3ShortsPrice);
        ComparePrices(Price36, 36, ManC3SocksPrice);
        ComparePrices(Price37, 37, RealHomeShirtPrice);
        ComparePrices(Price38, 38, RealHomeShortsPrice);
        ComparePrices(Price39, 39, RealHomeSocksPrice);
        ComparePrices(Price40, 40, RealAwayShirtPrice);
        ComparePrices(Price41, 41, RealAwayShortsPrice);
        ComparePrices(Price42, 42, RealAwaySocksPrice);
        ComparePrices(Price43, 43, Real3ShirtPrice);
        ComparePrices(Price44, 44, Real3ShortsPrice);
        ComparePrices(Price45, 45, Real3SocksPrice);
        
    }//GEN-LAST:event_SubmitChangesButtonActionPerformed

    private void HelpMenuItemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_HelpMenuItemActionPerformed
        // TODO add your handling code here:
        Help HelpPage = new Help();
        HelpPage.setVisible(true);
        HelpPage.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_HelpMenuItemActionPerformed

    private void LogOutMenuItemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_LogOutMenuItemActionPerformed
        // TODO add your handling code here:
        int result = JOptionPane.showConfirmDialog(null, "Are you sure you want to Log Out ?", "Log Out Confirmation", JOptionPane.YES_NO_OPTION, JOptionPane.QUESTION_MESSAGE);
        if(result == 0){
            LoginAndRegistration FirstPage = new LoginAndRegistration();
            FirstPage.setVisible(true);
            dispose();
        }
        else{}
    }//GEN-LAST:event_LogOutMenuItemActionPerformed

    private void SearchMenuItemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_SearchMenuItemActionPerformed
        // TODO add your handling code here:
        Search SearchFrame = new Search();
        SearchFrame.setVisible(true);
        SearchFrame.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_SearchMenuItemActionPerformed

    private void QueryActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_QueryActionPerformed
        // TODO add your handling code here:
        CustomersQueries Queries = new CustomersQueries();
        Queries.setVisible(true);
        Queries.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_QueryActionPerformed

    
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
            java.util.logging.Logger.getLogger(AllProducts.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(AllProducts.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(AllProducts.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(AllProducts.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new AllProducts().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JSpinner Bayern3ShirtPrice;
    private javax.swing.JSpinner Bayern3ShortsPrice;
    private javax.swing.JSpinner Bayern3SocksPrice;
    private javax.swing.JSpinner BayernAwayShirtPrice;
    private javax.swing.JSpinner BayernAwayShortsPrice;
    private javax.swing.JSpinner BayernAwaySocksPrice;
    private javax.swing.JSpinner BayernHomeShirtPrice;
    private javax.swing.JSpinner BayernHomeShortsPrice;
    private javax.swing.JSpinner BayernHomeSocksPrice;
    private javax.swing.JMenuItem HelpMenuItem;
    private javax.swing.JLabel InformationField;
    private javax.swing.JSpinner Juve3ShirtPrice;
    private javax.swing.JSpinner Juve3ShortsPrice;
    private javax.swing.JSpinner Juve3SocksPrice;
    private javax.swing.JSpinner JuveAwayShirtPrice;
    private javax.swing.JSpinner JuveAwayShortsPrice;
    private javax.swing.JSpinner JuveAwaySocksPrice;
    private javax.swing.JLabel JuveHomeShirtLbl;
    private javax.swing.JSpinner JuveHomeShirtPrice;
    private javax.swing.JSpinner JuveHomeShortsPrice;
    private javax.swing.JSpinner JuveHomeSocksPrice;
    private javax.swing.JMenuItem LogOutMenuItem;
    private javax.swing.JSpinner ManC3ShirtPrice;
    private javax.swing.JSpinner ManC3ShortsPrice;
    private javax.swing.JSpinner ManC3SocksPrice;
    private javax.swing.JSpinner ManCAwayShirtPrice;
    private javax.swing.JSpinner ManCAwayShortsPrice;
    private javax.swing.JSpinner ManCAwaySocksPrice;
    private javax.swing.JSpinner ManCHomeShirtPrice;
    private javax.swing.JSpinner ManCHomeShortsPrice;
    private javax.swing.JSpinner ManCHomeSocksPrice;
    private javax.swing.JSpinner PSG3ShirtPrice;
    private javax.swing.JSpinner PSG3ShortsPrice;
    private javax.swing.JSpinner PSG3SocksPrice;
    private javax.swing.JSpinner PSGAwayShirtPrice;
    private javax.swing.JSpinner PSGAwayShortsPrice;
    private javax.swing.JSpinner PSGAwaySocksPrice;
    private javax.swing.JSpinner PSGHomeShirtPrice;
    private javax.swing.JSpinner PSGHomeShortsPrice;
    private javax.swing.JSpinner PSGHomeSocksPrice;
    private javax.swing.JMenuItem Query;
    private javax.swing.JSpinner Real3ShirtPrice;
    private javax.swing.JSpinner Real3ShortsPrice;
    private javax.swing.JSpinner Real3SocksPrice;
    private javax.swing.JSpinner RealAwayShirtPrice;
    private javax.swing.JSpinner RealAwayShortsPrice;
    private javax.swing.JSpinner RealAwaySocksPrice;
    private javax.swing.JSpinner RealHomeShirtPrice;
    private javax.swing.JSpinner RealHomeShortsPrice;
    private javax.swing.JSpinner RealHomeSocksPrice;
    private javax.swing.JMenuItem SearchMenuItem;
    private javax.swing.JButton SubmitChangesButton;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel14;
    private javax.swing.JLabel jLabel15;
    private javax.swing.JLabel jLabel16;
    private javax.swing.JLabel jLabel17;
    private javax.swing.JLabel jLabel18;
    private javax.swing.JLabel jLabel19;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel20;
    private javax.swing.JLabel jLabel21;
    private javax.swing.JLabel jLabel22;
    private javax.swing.JLabel jLabel23;
    private javax.swing.JLabel jLabel24;
    private javax.swing.JLabel jLabel25;
    private javax.swing.JLabel jLabel26;
    private javax.swing.JLabel jLabel27;
    private javax.swing.JLabel jLabel28;
    private javax.swing.JLabel jLabel29;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel30;
    private javax.swing.JLabel jLabel31;
    private javax.swing.JLabel jLabel32;
    private javax.swing.JLabel jLabel33;
    private javax.swing.JLabel jLabel34;
    private javax.swing.JLabel jLabel35;
    private javax.swing.JLabel jLabel36;
    private javax.swing.JLabel jLabel37;
    private javax.swing.JLabel jLabel38;
    private javax.swing.JLabel jLabel39;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel40;
    private javax.swing.JLabel jLabel41;
    private javax.swing.JLabel jLabel42;
    private javax.swing.JLabel jLabel43;
    private javax.swing.JLabel jLabel44;
    private javax.swing.JLabel jLabel45;
    private javax.swing.JLabel jLabel46;
    private javax.swing.JLabel jLabel47;
    private javax.swing.JLabel jLabel48;
    private javax.swing.JLabel jLabel49;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel50;
    private javax.swing.JLabel jLabel51;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JMenu jMenu1;
    private javax.swing.JMenu jMenu2;
    private javax.swing.JMenuBar jMenuBar1;
    // End of variables declaration//GEN-END:variables
}
