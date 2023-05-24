export default [
  {
    title: "Dashboard",
    icon: "HomeIcon",
    route: "dashboard-new"
  },
    {
    title: "Database",
    icon: "DatabaseIcon",
    route: "database-management"
  },
  {
    title: "Matter Management",
    icon: "FolderIcon",
    route: "matter-management"
  },
   {
    title: "Documents",
    icon: "FileIcon",
    route: "document-management"
  },
  {
    title: "Mail",
    icon: "MailIcon",
    tagVariant: "light-warning",
    children: [
       {
        title: "Mail Track",
        route: "mail-track"
      },
      {
        title: "Description",
        route: "mail-desc"
      }
    ]
  },
  {
    title: "Finance",
    icon: "CreditCardIcon",
     route: "finance-invoice"
  },
  {
    title: "User",
    icon: "UsersIcon",
    route: "user-management"
  },
  {
    title: "Relevant",
    icon: "AnchorIcon",
    route: "relevant"
  },
  {
    title: "Report",
    icon: "ServerIcon",
    route: "report-management"
  },
  {
    header: 'Settings',
  },
  {
    title: "Input",
    icon: "SettingsIcon",
    tagVariant: "light-warning",
    children: [
      {
        title: "Roles",
        route: "role-settings"
      },
      {
        title: "Matter Status",
        route: "matterstatus-settings"
      },
       {
        title: "Type of Title",
        route: "title-settings"
      },
      {
        title: "Property Usage",
        route: "usage-settings"
      },
      {
        title: "Type of Tenure",
        route: "tenure-settings"
      },
      {
        title: "Type of Property",
        route: "property-settings"
      },
      {
        title: "Unit",
        route: "unit-settings"
      },
      {
        title: "Trademark",
        route: "trademark-settings"
      },
      {
        title: "Payment Mode",
        route: "paymentmode-settings"
      },
      {
        title: "Payment Fee",
        route: "paymentfee-settings"
      },
      {
        title: 'Assets',
        children: [
          {
            title: 'Assets Type',
            route: 'assettype-settings',
          },
          {
            title: 'Assets',
            route: 'assets-settings',
          },
        ],
      },
      {
        title: 'Relevant',
        children: [
          {
            title: 'Relevant',
            route: 'relevant-settings',
          },
          {
            title: 'Relevant Type',
            route: 'relevanttype-settings',
          },
        ],
      },
    ]
  },
];
